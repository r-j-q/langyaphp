<?php

namespace app\models\user;

use think\Model;

class User extends Model
{
    protected $table = 'data_user';
    /**
     * description: TODO   第一步 根据微信基本信息 创建用户基础信息
     * date: 2022/4/20
     * time: 11:55 PM
     * cy
     */
    public static function addUserInfo($data)
    {
        $data['create_at'] = date('Y-m-d H:i:s');
        return self::insert($data);
    }

    /**
     * description: TODO   第二部 绑定电话
     * date: 2022/4/21
     * time: 12:22 AM
     * cy
     */
    public static function addUserPhone($open_id, $phone)
    {
        $user = self::where('openid1', $open_id)->find();
        if ($user) {
            if (!$user['phone']) { //没有电话号码的情况再去绑定电话
                self::where('openid1', $open_id)->update(['phone' => $phone]);
            }
            return self::where('openid1', $open_id)->field('id,nickname,headimg,phone')->find();
        } else {
            return false;
        }
    }
    /**
     * description: TODO  获取用户个人信息
     * date: 2022/5/12
     * time: 10:27 PM
     * cy
     */
    public static function getUser($wh = [],$field = 'u.id'){
        return self::alias('u')->where($wh)->field($field)->find();
    }
    // 解析一下  用户的昵称
    public function getNicknameAttr($value)
    {
        return base64_decode($value);
    }
    // 给头像没有 域名的 加上当前域名
    public function getHeadimgAttr($value){
        return isHttp($value);
    }
}