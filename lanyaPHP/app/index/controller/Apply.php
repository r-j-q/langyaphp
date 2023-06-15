<?php

namespace app\index\controller;

use think\admin\Controller;
use think\Request;

class Apply extends Controller
{
    /**
     * description: TODO   报名头部信息
     * date: 2022/10/19
     * time: 2:46 PM
     * cy
     */
    public function getApplyContent(Request $request)
    {
        $sign_up_data = sysdata('sign_up');
        $this->dataJson($sign_up_data);
    }



}