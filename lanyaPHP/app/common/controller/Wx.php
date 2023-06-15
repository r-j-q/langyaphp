<?php

namespace app\common\controller;

use think\App;
use think\facade\Cache;

class Wx
{
    private $applet_appid;
    private $applet_secret;

    public function __construct($applet_appid = null, $applet_secret = null)
    {
        $this->applet_appid = $applet_appid;
        $this->applet_secret = $applet_secret;
    }

    /**
     * description: TODO 获取临时的登陆凭证
     * User: cy
     * DateTime: 2021/9/6 5:09 下午
     * Email: cycy_up@163.com
     * @params:  * @param null
     * @return
     */
    public function getWechatSession_key($code)
    {
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $this->applet_appid . '&secret=' . $this->applet_secret . '&js_code=' . $code . '&grant_type=authorization_code';
        $result = $this->getCurl($url);
        return $result;
    }

    /**
     * description: TODO 获取 getAccessToken
     * User: cy
     * DateTime: 2021/9/10 12:07 下午
     * Email: cycy_up@163.com
     * @params:  * @param null
     * @return
     */
    public function getAccessToken()
    {
        $applet_access_token = Cache::get('applet_access_token');
        if ($applet_access_token) {
            return $applet_access_token;
        } else {
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $this->applet_appid . '&secret=' . $this->applet_secret;
            $result = $this->getCurl($url);
            $result = json_decode($result, true);
            Cache::set('applet_access_token', $result['access_token'], 7000);
            return $result['access_token'];
        }
    }

    /**
     * description: TODO 转介绍小程序获取 token
     * User: cy
     * DateTime: 2021/10/26 2:17 下午
     * Email: cycy_up@163.com
     * @params:  * @param null
     * @return
     */
    public function getAccessTokenActivity()
    {
        $applet_access_token = Cache::get('applet_access_token_activity');
        if ($applet_access_token) {
            return $applet_access_token;
        } else {
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $this->applet_appid . '&secret=' . $this->applet_secret;
            $result = $this->getCurl($url);
            $result = json_decode($result, true);

            Cache::set('applet_access_token_activity',$result['access_token'],7000);
            return $result['access_token'];
        }
    }

    /**
     * description: TODO 获取用户的open_id
     * User: cy
     * DateTime: 2021/9/10 12:10 下午
     * Email: cycy_up@163.com
     * @params:  * @param null
     * @return
     */
    public function getOpenId($code)
    {
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $this->applet_appid . '&secret=' . $this->applet_secret . '&js_code=' . $code . '&grant_type=authorization_code';
        $result = $this->getCurl($url);
        return $result;
    }

    /**
     * description: TODO 获取用户基本信息
     * User: cy
     * DateTime: 2021/9/10 12:13 下午
     * Email: cycy_up@163.com
     * @params:  * @param null
     * @return
     */
    public function getUserInfo($openid)
    {
        $token = $this->getAccessToken();
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . $token . '&openid=' . $openid . '&lang=zh_CN';
        $result = $this->getCurl($url);
        return $result;
    }

    /**
     * description: TODO   获取用户手机号
     * date: 2022/10/31
     * time: 11:52 AM
     * cy
     */
    public function getPhoneNumber($code)
    {
        $url = 'https://api.weixin.qq.com/wxa/business/getuserphonenumber?access_token='.$this->getAccessToken();
        $data['code'] = $code;
        $result = $this->curlPost($url,$data);
        return $result;
    }
    /**
     * description: TODO   get
     * date: 2022/4/20
     * time: 11:49 PM
     * cy
     */
    public function getCurl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function curlPost($url, $param)
    {
        if (empty($url) || empty($param)) {
            return false;
        }
        $data_str = json_encode($param,JSON_UNESCAPED_UNICODE);
        $ch = curl_init($url); //初始化curl
        curl_setopt($ch, CURLOPT_MAXREDIRS, 20); //页面跳转次数
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且不输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1); //post提交方式---
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // 在尝试连接时等待的秒数
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_str); //提交数据
// 设置json头
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data_str))
        );
        $contents = curl_exec($ch);
        curl_close($ch);

        return $contents;
    }
}