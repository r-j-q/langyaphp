<?php

namespace app\index\controller;

use app\common\controller\Jwt;
use app\common\controller\Wx;
use app\models\user\User;
use think\admin\Controller;
use think\facade\Cache;

class Login extends Controller
{
    protected $applet_id = 'wx9319c16d69e8e280';
 //   protected $applet_secret = '74ac5fade5f5936aa4688683e5d89340';
     protected $applet_secret = '1b115b9a16d67ad493dee7caede35528';
    /**
     * description: TODO   授权接口
     * date: 2022/4/20
     * time: 11:37 PM
     * cy
     */
    public function authorization()
    {

        $code = input('code/s');
        $userinfo = input('userInfo');
        if (empty($code)) $this->errorJson('code参数丢失');
        $userinfo = json_decode($userinfo,1);
        if (!isset($userinfo[0])) $this->errorJson('用户信息丢失');
        $userinfo = $userinfo[0];
        $data = [
            'headimg' => $userinfo['avatarUrl'],
            'nickname' => base64_encode($userinfo['nickName']),
            'base_sex' => $userinfo['gender'] ? $userinfo['gender'] : 1,
        ];
        $wxAuto = new Wx($this->applet_id, $this->applet_secret);
        $open_id_res = json_decode($wxAuto->getOpenId($code), true);  // 获取open_id

        if (isset($open_id_res['openid']) && $open_id_res['openid']) {
            $open_id = $open_id_res['openid'];
        } else {
            $this->errorJson('系统繁忙请稍后再试',$open_id_res);
        }

        $data['openid1'] = $open_id;
        if (!User::where('openid1', $open_id)->find()) {
            if(!User::addUserInfo($data)){
                $this->errorJson('系统繁忙请稍后再试.');
            }
        }
        $this->successJson('ok', ['openid' => $open_id]);

    }
    public function login()
    {
        $code = input('code');
        $encryptedData = input('encryptedData');
        $iv = input('iv');

        $this->_vali([
            'code.require' => 'code不能为空！',
            'encryptedData.require' => 'encryptedData不能为空！',
            'iv.require' => 'iv不能为空！',
        ], 'post');

        $wxAuto = new Wx($this->applet_id, $this->applet_secret);
        $authData = $wxAuto->getWechatSession_key($code);  // todo 获取临时的登陆凭证
        $authData = json_decode($authData, true);
        if (isset($authData['errcode']) && $authData['errcode'] != 0) {
            $this->errorJson($authData['errcode']);
        }
        $WXB = new \app\common\controller\WXBizDataCrypt($this->applet_id);
        $decryData = [];
        $errorCode = $WXB->decryptData($authData['session_key'], $encryptedData, $iv, $decryData); // todo 验证数据 并解密

        if ($errorCode != 0) {
            $this->errorJson('系统繁忙，请稍后再试');
        }

        $phone = $decryData->phoneNumber;
        if (empty($phone)) $this->errorJson('电话号码为空');
        $user_applet = User::addUserPhone($authData['openid'], $phone);
        if (!$user_applet) {
            $this->error('系统繁忙，登录失败，请稍后再试。');
        }
        $token = $this->successToken($user_applet);
        $token['phone'] = $phone;
        $this->successJson('登录成功', $token);
    }
    /**
     * @description: TODO  登录成功的方法
     * @return
     * @author: cy
     * @date:  2021/7/7 15:57
     * @params:  * @param null
     */
    public function successToken($user)
    {
        $token = $this->getToken($user['id'], $user['nickname']);
        if (!$token) $this->errorJson('生成令牌失败');
        Cache::set('uid_' . $user['id'], time() + 30 * 86400);
        $data = [
            'token' => $token,
        ];
        return $data;
    }
    /**
     * @description: 生成token
     * @return
     * @author: cy
     * @date:  2020/9/14 0014 下午 04:39:18
     * @params:  * @param null
     */
    public function getToken($uid, $nickname)
    {
        $jwt = new Jwt();
        $loginInfo = array(
            'uid' => $uid,
            'real_name' => $nickname,
            'iss' => 'coffer_u',
            'sub' => 'coffer_u_url',
            'jti' => md5(uniqid('JWT') . time()),
        );
        $token = $jwt::getTokens($loginInfo);
        return $token;
    }
}