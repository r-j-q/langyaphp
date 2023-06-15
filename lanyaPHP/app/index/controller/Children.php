<?php

namespace app\index\controller;

use think\admin\Controller;
use think\facade\Db;
use think\Request;

class Children extends Controller
{
    public $url = 'http://akeso.com.cn';

    /**
     * description: TODO  获取儿童日报
     * date: 2022/11/14
     * time: 11:02 AM
     * cy
     */
    public function getReportsDaily(Request $request)
    {
        $child_id = $request->param('child_id');
        $date = $request->param('date');

        if(empty($child_id)) $this->errorJson('参数丢失');
        $date ?? $date = date('Y-m-d');
        $url  = 'http://akeso.com.cn/api/open/reports/daily';

        $data = [
            'child_id' => $child_id,
            'date' => $date
        ];
        $res = $this->getCurl($url, $data);
        $res = json_decode($res, 1);

        if(isset($res['status']) && $res['status'] == 200 ){
            $data = $res['data'];
            $map = [
                'type'=>1,
                'child_id'=>$child_id,
                'time_array'=>$date,
                'data'=>json_encode($data),
            ];
            if(Db::table('statement')->where(['child_id'=>$child_id,'type'=>$map['type'],'time_array'=>$map['time_array']])
                ->find()){
                Db::table('statement')->where(['child_id'=>$child_id,'type'=>$map['type'],'time_array'=>$map['time_array']])
                    ->update($map);
            }else{
                Db::table('statement')->insert($map);
            }
            $this->dataJson($data);
        }else{
            $wh[] = ['child_id','=',$child_id];
            $wh[] = ['time_array','=',$date];
            $wh[] = ['type','=',1];
            $data =  Db::table('statement')->where($wh)->value('data');
            if(empty($data)){
                $this->errorJson('系统维护中，请稍后再试');
            }
            $this->dataJson(json_decode($data,1));
        }

    }

    // 获取周报
    public function getWeekly(Request $request)
    {
        $date = $request->get('date');
        $child_id = $request->get('child_id');

        if(empty($child_id)) $this->errorJson('参数丢失');
        $date ?? $date = date('Y-m-d');
        $url  = 'http://akeso.com.cn/api/open/reports/weekly';

        $data = [
            'child_id' => $child_id,
            'date' => $date
        ];
        $res = $this->getCurl($url, $data);
        $res = json_decode($res, 1);

        if(isset($res['status']) && $res['status'] == 200 ){
            $data = $res['data'];
            $map = [
                'type'=>2,
                'child_id'=>$child_id,
                'time_array'=>implode(',',$data['time_array']),
                'data'=>json_encode($data),
            ];
            if(Db::table('statement')->where(['child_id'=>$child_id,'type'=>$map['type'],'time_array'=>$map['time_array']])
            ->find()){
                Db::table('statement')->where(['child_id'=>$child_id,'type'=>$map['type'],'time_array'=>$map['time_array']])
                    ->update($map);
            }else{
                Db::table('statement')->insert($map);
            }
            $this->dataJson($data);
        }else{
            $week  = get_week(strtotime($date));
            $week = implode(',',$week);
            $wh[] = ['child_id','=',$child_id];
            $wh[] = ['time_array','=',$week];
            $wh[] = ['type','=',2];
            $data =  Db::table('statement')->where($wh)->value('data');
            if(empty($data)){
                $this->errorJson('系统维护中，请稍后再试');
            }
            $this->dataJson(json_decode($data,1));
        }
    }
    public function getMonthly(Request $request){
        $date = $request->get('date');
        $child_id = $request->get('child_id');

        if(empty($child_id)) $this->errorJson('参数丢失');
        $date ?? $date = date('Y-m-d');
        $url  = 'http://akeso.com.cn/api/open/reports/monthly';

        $data = [
            'child_id' => $child_id,
            'date' => $date
        ];
        $res = $this->getCurl($url, $data);
        $res = json_decode($res, 1);

        if(isset($res['status']) && $res['status'] == 200   ){
            $data = $res['data'];
            $map = [
                'type'=>3,
                'child_id'=>$child_id,
                'time_array'=>implode(',',$data['time_array']),
                'data'=>json_encode($data),
            ];
            if(Db::table('statement')->where(['child_id'=>$child_id,'type'=>$map['type'],'time_array'=>$map['time_array']])
                ->find()){
                Db::table('statement')->where(['child_id'=>$child_id,'type'=>$map['type'],'time_array'=>$map['time_array']])
                    ->update($map);
            }else{
                Db::table('statement')->insert($map);
            }
            $this->dataJson($data);
        }else{
            $month  = get_month(strtotime($date));
            $month = implode(',',$month);

            $wh[] = ['child_id','=',$child_id];
            $wh[] = ['time_array','=',$month];
            $wh[] = ['type','=',3];
            $data =  Db::table('statement')->where($wh)->value('data');
            if(empty($data)){
                $this->errorJson('系统维护中，请稍后再试');
            }
            $this->dataJson(json_decode($data,1));
        }
    }
    /**
     * CURL Get
     */
    public function getCurl($url, $data = [])
    {
        if ($url == "") {
            return false;
        }
        $url = $url . '?' . http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        //参数为1表示传输数据，为0表示直接输出显示。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //参数为0表示不带头文件，为1表示带头文件
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // 关闭SSL验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $output = curl_exec($ch);
        if (curl_exec($ch) === false) {
            echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }

    /**
     * CURL Post
     */
    private function postCurl($url, $option, $header = ['Content-Type' => 'application/json'], $type = 'POST')
    {

        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)'); // 模拟用户使用的浏览器
        if (!empty ($option)) {
            $options = json_encode($option);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $options); // Post提交的数据包
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // 设置HTTP头
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type);
        $result = curl_exec($curl); // 执行操作
//        $meta = curl_getinfo($curl);

        curl_close($curl); // 关闭CURL会话
        return $result;
    }
}