<?php

namespace app\index\controller;

use app\data\model\DataActivity;
use app\models\user\UserActivity;
use think\admin\Controller;
use think\App;
use think\facade\Db;
use think\Request;

class User extends Controller
{
    protected $uid;

    public function __construct(App $app, Request $request)
    {
        parent::__construct($app);
        $this->uid = $request->uid;
    }

    /**
     * description: TODO   获取个人身份信息
     * date: 2022/10/18
     * time: 5:10 PM
     * cy
     */
    public function getUserInfo(Request $request)
    {

        $user = \app\models\user\User::where('id', $this->uid)->field('headimg,nickname,phone,is_band')->find();
        if (empty($user)) $this->errorJson('用户信息已经不存在，请重新登录', '', 209);
        $customer_tel = sysdata('about');
        $customer_tel = strip_tags($customer_tel['content']);

        $data = [
            'user' => $user,//个人资料
            'customer_tel' => $customer_tel,//客服电话
        ];
        $this->dataJson($data);
    }

    /**
     * description: TODO   上传文件
     * date: 2022/4/15
     * time: 6:22 PM
     * cy
     */
    public function uploads()
    {
        $common = new \app\common\controller\Common($this->app);
        $res = $common->file();

        if($res['code'] == 200){
            $this->successJson('ok',['url'=>$res['url'],'filname'=>$res['filname']]);
        }
        $this->errorJson($res['msg']);
    }
    /**
     * description: TODO   更新个人信息
     * date: 2022/11/1
     * time: 4:09 PM
     * cy
     */
    public function editUser(Request $request)
    {
        $headimg = $request->post('headimg');
        $nickname = $request->post('nickname');

        if(empty($headimg)) $this->errorJson('头像不能为空');
        if(empty($nickname)) $this->errorJson('昵称不能为空');

        \app\models\user\User::where('id',$this->uid)
            ->update(['headimg'=>$headimg,
                'nickname'=>base64_encode($nickname)]);

        $this->successJson('保存成功');
    }

    //获取活动列表
    public function getActivityLst(Request $request)
    {
        $limit = $request->param('limit');

        $data = DataActivity::where(['status' => 1, 'deleted' => 0])->field('id,name,cover,activity_at,content')->order('sort desc')
            ->paginate($limit)->each(function ($item) {
                $item['content'] = $this->stringToText($item['content'], 100);
                return $item;
            });
        $this->dataJson($data);
    }

    public function stringToText($string, $num)
    {
        if ($string) {
            //把一些预定义的 HTML 实体转换为字符
            $html_string = htmlspecialchars_decode($string);
            //将空格替换成空
            $content = str_replace("?", "", $html_string);
            //函数剥去字符串中的 HTML、XML 以及 PHP 的标签,获取纯文本内容
            $contents = strip_tags($content);
            //返回字符串中的前$num字符串长度的字符
            return mb_strlen($contents, 'utf-8') > $num ? mb_substr($contents, 0, $num, "utf-8") . '....' : mb_substr($contents, 0, $num, "utf-8");
        } else {
            return $string;
        }
    }

    //活动详情
    public function getActivityDetails(Request $request)
    {
        $id = $request->param('id');
        if (empty($id)) $this->errorJson('活动id参数丢失');
        $info = DataActivity::where(['status' => 1, 'deleted' => 0, 'id' => $id])->field('id,name,cover,create_at,content,address')
            ->find();
        if (empty($info)) $this->errorJson('抱歉，该活动信息丢失', [], 203);
        $this->dataJson(['data' => $info]);

    }

    //活动报名
    public function applyActivity(Request $request)
    {
        $name = $request->post('name');
        $phone = $request->post('phone');
        $activity_id = $request->post('activity_id');

        if (empty($name)) $this->errorJson('姓名不能为空');
        if (empty($phone)) $this->errorJson('电话号码不能为空');
        if (empty($activity_id)) $this->errorJson('活动id不能为空');

        $data = [
            'uid' => $request->uid,
            'name' => $name,
            'activity_id' => $activity_id,
            'phone' => $phone,
            'create_at' => date('Y-m-d H:i:s'),
        ];

        if (UserActivity::insert($data)) {
            $this->successJson('预约成功');
        }

        $this->errorJson('系统繁忙，请稍后再试');
    }

    // 数据接收
    public function dataSta(Request $request)
    {
        dump($request->post());
        die;
    }

    //我的活动列表
    public function myActivityLst(Request $request)
    {
        $uid = $request->uid;
        $limit = $request->param('limit');
        $info = Db::table('user_activity u')->leftJoin('data_activity d', 'd.id = u.activity_id')
            ->where('u.uid', $uid)->field('u.id,u.name,u.phone,d.address,d.activity_at')->paginate($limit);

        $this->dataJson($info);

    }


}