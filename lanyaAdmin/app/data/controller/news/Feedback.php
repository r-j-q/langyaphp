<?php

namespace app\data\controller\news;

use app\data\model\DataUser;
use app\data\model\DataFeedback;
use think\admin\Controller;

/**
 * 意见反馈管理
 * Class Feedback
 * @package app\data\controller\news
 */
class Feedback extends Controller
{
    /**
     * 意见反馈管理
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        $this->title = '意见反馈管理';
        $query = DataFeedback::mQuery();
        $query->like('name')->equal('status')->dateBetween('create_at');

        // 代理搜索查询
        $db = DataUser::mQuery()->like('nickname')->db();
        if ($db->getOptions('where')) $query->whereRaw("uuid in {$db->field('id')->buildSql()}");

        $query->order('id desc')->page();
    }

    /**
     * 列表数据处理
     * @param array $data
     */
    protected function _page_filter(array &$data)
    {
        foreach ($data as $k => &$v) {
            if($v['uuid'])$v['nickname'] = DataUser::mk()->where('id',$v['uuid'])->value('nickname');
        }
    }

    /**
     * 添加意见反馈
     * @auth true
     */
    public function add()
    {
        DataFeedback::mForm('form');
    }

    /**
     * 编辑意见反馈
     * @auth true
     */
    public function edit()
    {
        DataFeedback::mForm('form');
    }

    /**
     * 修改意见反馈状态
     * @auth true
     */
    public function state()
    {
        DataFeedback::mSave($this->_vali([
            'status.in:0,1,2'  => '状态值范围异常！',
            'status.require' => '状态值不能为空！',
        ]));
    }

    /**
     * 删除意见反馈
     * @auth true
     */
    public function remove()
    {
        DataFeedback::mDelete();
    }
}