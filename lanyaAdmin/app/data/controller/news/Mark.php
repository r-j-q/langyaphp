<?php

namespace app\data\controller\news;

use app\data\model\DataNewsMark;
use think\admin\Controller;

/**
 * 活动标签管理
 * Class Mark
 * @package app\data\controller\news
 */
class Mark extends Controller
{
    /**
     * 活动标签管理
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        $this->title = '活动标签管理';
        $query = DataNewsMark::mQuery();
        $query->like('name')->equal('status')->dateBetween('create_at');
        $query->where(['deleted' => 0])->order('sort desc,id desc')->page();
    }

    /**
     * 添加活动标签
     * @auth true
     */
    public function add()
    {
        DataNewsMark::mForm('form');
    }

    /**
     * 编辑活动标签
     * @auth true
     */
    public function edit()
    {
        DataNewsMark::mForm('form');
    }

    /**
     * 修改活动标签状态
     * @auth true
     */
    public function state()
    {
        DataNewsMark::mSave($this->_vali([
            'status.in:0,1'  => '状态值范围异常！',
            'status.require' => '状态值不能为空！',
        ]));
    }

    /**
     * 删除活动标签
     * @auth true
     */
    public function remove()
    {
        DataNewsMark::mDelete();
    }
}