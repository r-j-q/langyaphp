<?php

namespace app\common\controller;

use think\admin\Controller;
use think\admin\Storage;
use think\admin\storage\LocalStorage;
use think\Exception;
use think\exception\HttpResponseException;
use think\file\UploadedFile;

class Common extends Controller
{
    public function file()
    {
        if (!($file = $this->getFile())->isValid()) {
            $this->errorJson('文件上传异常，文件过大或未上传！');
        }
        $safeMode = $this->getSafe();
        $extension = strtolower($file->getOriginalExtension());
        $saveName = input('key') ?: Storage::name($file->getPathname(), $extension, '', 'md5_file');

        // 检查文件名称是否合法
        if (strpos($saveName, '../') !== false) {
            $this->errorJson('文件路径不能出现跳级操作！');
        }
        // 检查文件后缀是否被恶意修改
        if (pathinfo(parse_url($saveName, PHP_URL_PATH), PATHINFO_EXTENSION) !== $extension) {
            $this->errorJson('文件后缀异常，请重新上传文件！');
        }
        // 屏蔽禁止上传指定后缀的文件
        if (!in_array($extension, str2arr(sysconf('storage.allow_exts')))) {
            $this->errorJson('文件类型受限，请在后台配置规则！');
        }
        if (in_array($extension, ['sh', 'asp', 'bat', 'cmd', 'exe', 'php'])) {
            $this->errorJson('文件安全保护，禁止上传可执行文件！');
        }

            if ($this->getType() === 'local') {
                $local = LocalStorage::instance();
                $distName = $local->path($saveName, $safeMode);
                $filname=basename($distName);
                $file_arr= explode('.',$filname);
                $filname=$file_arr[0];

                $file->move(dirname($distName), basename($distName));

                $info = $local->info($saveName, $safeMode, $file->getOriginalName());

                if (in_array($extension, ['jpg', 'gif', 'png', 'bmp', 'jpeg','webp'])) {
                    if ($this->imgNotSafe($distName) && $local->del($saveName)) {
                        $this->errorJson('The picture failed the security check！');
                    }
                    [$width, $height] = getimagesize($distName);

                    if (($width < 1 || $height < 1) && $local->del($saveName)) {
                        $this->errorJson('Failed to read the size of the picture！');
                    }
                }
            } else {
                $bina = file_get_contents($file->getPathname());
                $info = Storage::instance($this->getType())->set($saveName, $bina, $safeMode, $file->getOriginalName());
            }

            if (isset($info['url'])) {
                return ['url' =>  isHttp('/'.$info['key']),'filname'=>'/'.$info['key'],'code' =>200];
            } else {
                return ['msg' =>  'File processing failed, please try again later!！','code' =>201];
            }

    }

    /**
     * 获取本地文件对象
     * @return UploadedFile|void
     */
    private function getFile(): UploadedFile
    {
        try {
            $file = $this->request->file('file');
            if ($file instanceof UploadedFile) {
                return $file;
            } else {
                $this->errorJson('未获取到上传的文件对象！');
            }
        } catch (HttpResponseException $exception) {
            throw $exception;
        } catch (Exception $exception) {
            $this->errorJson(lang($exception->getMessage()));
        }
    }
    /**
     * 获取文件上传类型
     * @return boolean
     */
    private function getSafe(): bool
    {
        return boolval(input('safe', '0'));
    }

    /**
     * 获取文件上传方式
     * @return string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    private function getType(): string
    {
        $type = strtolower(input('uptype', ''));
        if (in_array($type, ['local', 'qiniu', 'alioss', 'txcos'])) {
            return $type;
        } else {
            return strtolower(sysconf('storage.type'));
        }
    }
    /**
     * 检查图片是否安全
     * @param string $filename
     * @return boolean
     */
    private function imgNotSafe(string $filename): bool
    {
        $source = fopen($filename, 'rb');
        if (($size = filesize($filename)) > 512) {
            $hexs = bin2hex(fread($source, 512));
            fseek($source, $size - 512);
            $hexs .= bin2hex(fread($source, 512));
        } else {
            $hexs = bin2hex(fread($source, $size));
        }
        if (is_resource($source)) fclose($source);
        $bins = hex2bin($hexs);
        /* 匹配十六进制中的 <% ( ) %> 或 <? ( ) ?> 或 <script | /script> */
        foreach (['<?php ', '<% ', '<script '] as $key) if (stripos($bins, $key) !== false) return true;
        return preg_match("/(3c25.*?28.*?29.*?253e)|(3c3f.*?28.*?29.*?3f3e)|(3C534352495054)|(2F5343524950543E)|(3C736372697074)|(2F7363726970743E)/is", $hexs);
    }
}