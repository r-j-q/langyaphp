<?php

// +----------------------------------------------------------------------
// | Library for ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2022 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/zoujingli/ThinkLibrary
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 仓库地址 ：https://gitee.com/zoujingli/ThinkLibrary
// | github 仓库地址 ：https://github.com/zoujingli/ThinkLibrary
// +----------------------------------------------------------------------

namespace think\admin\extend;

use think\Model;
use function Composer\Autoload\includeFile;

/**
 * 虚拟模型构建协议
 * Class VirtualModel
 * @package think\admin\extend
 */
class VirtualModel
{
    /**
     * 虚拟模型模板
     * @var string
     */
    private $template;

    /**
     * 读取进度标量
     * @var integer
     */
    private $position;

    public function stream_open($path, $mode, $options, &$opened_path): bool
    {
        $uri = parse_url($path);
        $this->position = 0;
        $this->template = '<?php ';
        $this->template .= 'namespace virtual\\model; ';
        $this->template .= "class {$uri['host']} extends \\think\\Model{ ";
        if (isset($uri['fragment']) && !empty($uri['fragment'])) {
            $this->template .= 'protected $connection="' . $uri['fragment'] . '"; ';
        }
        $this->template .= '}';
        return true;
    }

    public function stream_read($count)
    {
        $content = substr($this->template, $this->position, $count);
        $this->position += strlen($content);
        return $content;
    }

    public function stream_eof(): bool
    {
        return $this->position >= strlen($this->template);
    }

    public function stream_cast()
    {
    }

    public function stream_close()
    {
    }

    public function stream_flush(): bool
    {
        return true;
    }

    public function stream_lock(): bool
    {
        return true;
    }

    public function stream_set_option(): bool
    {
        return true;
    }

    public function stream_metadata(): bool
    {
        return true;
    }

    public function stream_stat()
    {
        return stat(__FILE__);
    }

    public function stream_tell(): int
    {
        return $this->position;
    }

    public function stream_truncate(): bool
    {
        return true;
    }

    public function stream_seek(): bool
    {
        return true;
    }

    public function stream_write(string $data): int
    {
        return strlen($data);
    }

    public function dir_opendir(): bool
    {
        return true;
    }

    public function dir_readdir(): string
    {
        return __DIR__;
    }

    public function dir_closedir(): bool
    {
        return true;
    }

    public function dir_rewinddir(): bool
    {
        return true;
    }

    public function rmdir(): bool
    {
        return true;
    }

    public function rename(): bool
    {
        return true;
    }

    public function unlink(): bool
    {
        return true;
    }

    public function url_stat()
    {
        return stat(__FILE__);
    }

    /**
     * 创建虚拟模型
     * @param mixed $name 模型名称
     * @param array $data 模型数据
     * @param mixed $conn 默认链接
     * @return Model
     */
    public static function mk(string $name, array $data = [], string $conn = ''): Model
    {
        if (!class_exists($class = "\\virtual\\model\\{$name}")) {
            if (!in_array('model', stream_get_wrappers())) {
                stream_wrapper_register('model', static::class);
            }
            includeFile("model://{$name}#{$conn}");
        }
        return new $class($data);
    }
}