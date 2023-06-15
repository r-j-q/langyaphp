<?php

namespace app\data\controller\api\auth;

use app\data\controller\api\Auth;
use app\data\model\DataFeedback;

/**
 * 文章反馈内容
 * Class Feedback
 * @package app\data\controller\api\auth
 */
class Feedback extends Auth
{

    /**
     * 用户反馈内容
     */
    public function addFeedback()
    {
        $data = $this->_vali([
            'uuid.value'    => $this->uuid,
            'status.value'  => 1,
            'kuanshi.require' => '产品的款式不能为空！',
            'sheji.require' => '产品的设计不能为空！',
            'baozhuang.require' => '产品的包装不能为空！',
            'jiage.require' => '产品的价格不能为空！',
            'jiemian.require' => '软件的界面不能为空！',
            'gongneng.require' => '软件的功能不能为空！',
            'taidu.require' => '服务的态度不能为空！',
            'zhuanyexing.require' => '服务的专业性不能为空！',
            'jingpian.require' => '您想要的镜片不能为空！',
            'yingyong.require' => '您最想要的应用功能不能为空！',
            'remark.require' => '个人意见与改进建议不能为空！',
        ]);
        if (DataFeedback::mk()->insert($data) !== false) {
            $this->success('添加反馈成功！');
        } else {
            $this->error('添加反馈失败！');
        }
    }

    /**
     * 获取我的反馈
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getFeedback()
    {
        $query = DataFeedback::mQuery()->where(['uuid' => $this->uuid, 'type' => 4]);
        $result = $query->whereIn('status', [1, 2])->order('id desc')->page(true, false);
        $this->success('获取反馈列表成功', $result);
    }

    /**
     * 反馈项
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getFeedbackSetting()
    {
        $result = DataFeedback::mQuery()->getSetting();
        $this->success('获取反馈列表成功', $result);
    }

    /**
     * 删除内容反馈
     */
    public function delFeedback()
    {
        $data = $this->_vali([
            'uuid.value'   => $this->uuid,
            'id.require'   => '反馈编号不能为空！',
        ]);
        if (DataFeedback::mk()->where($data)->delete() !== false) {
            $this->success('反馈删除成功！');
        } else {
            $this->error('认证删除失败！');
        }
    }
}