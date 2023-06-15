<?php


namespace app\http\middleware;

use app\common\controller\Jwt;
use think\admin\Controller;
use think\facade\Cache;
use think\Request;

class AuthToken extends Controller
{
    public function handle(Request $request, \Closure $next)
    {

        $token = $request->header('token');

        if(!$token) $this->errorJson('登录信息已过期，请重新登录', [], 209);
        if($token != 'cy'){
            $jwt = new Jwt();
            $userInfo = $jwt::verifyToken($token);
            if(!$userInfo)  $this->errorJson('登录信息已过期，请重新登录', [], 209);
            $expTime = Cache::get('uid_' . $userInfo['uid']);
            if (!$expTime || time() > $expTime) $this->errorJson('登录信息已过期，请重新登录', [], 209);
            Cache::set('uid_' . $userInfo['uid'],time() + 30 * 86400);
            $request->uid  = $userInfo['uid'];
        }else{
            $request->uid = 1;
        }

        return $next($request);
    }
}