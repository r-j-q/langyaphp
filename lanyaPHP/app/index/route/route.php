<?php

use think\facade\Route;

Route::post('authorization', 'login/authorization'); //todo 获取个人资料
Route::post('login', 'login/login'); // todo  获取电话号码  并且注册


\think\facade\Route::group(function () {
    Route::get('getUserInfo', 'user/getUserInfo'); // todo 获取个人资料
    Route::post('editUser', 'user/editUser'); // todo 更新个人资料
    Route::post('uploads', 'user/uploads'); // todo 上传图片
   // Route::get('getApplyContent', 'apply/getApplyContent'); // todo 获取个人资料
    Route::get('getActivityLst', 'user/getActivityLst'); // todo 获取活动列表
    Route::get('getActivityDetails', 'user/getActivityDetails'); // todo 获取活动详情
    Route::post('applyActivity', 'user/applyActivity'); // todo 预约活动
    Route::post('dataSta', 'user/dataSta'); // todo 数据传输

    Route::get('myActivityLst', 'user/myActivityLst'); // todo 我的活动列表


    Route::get('getReportsDaily', 'children/getReportsDaily'); // todo 获取学员日报
    Route::get('getWeekly', 'children/getWeekly'); // todo 获取学员周报
    Route::get('getMonthly', 'children/getMonthly'); // todo 获取学员月报


})->middleware(\app\http\middleware\AuthToken::class);