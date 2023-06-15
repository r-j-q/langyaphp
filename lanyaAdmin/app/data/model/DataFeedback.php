<?php

namespace app\data\model;

use think\admin\Model;

/**
 *
 * Class DataFeedback
 * @package app\data\model
 */
class DataFeedback extends Model
{
	protected $jingpian = ['1' => '离焦镜片', '2' => '环焦镜片', '3' => '棱镜', '4'=> '防蓝光镜片'];
	protected $yingyong = ['1' => '通话', '2' => '拍摄', '3' => '导航', '4'=> '听广播'];

	public function getSetting() {
		return ['jingpian' => $this->jingpian, 'yingyong' => $this->yingyong];
	}

	public function getJingpianAttr($value){
		$values = explode(',', $value);
		$name = [];
		$jingpian = $this->jingpian;
		foreach ($values as $k => $v) {
			if(isset($jingpian[$v]))$name[] = $jingpian[$v];
		}
		return ['value' => $value, 'name' => implode(',', $name)];
	}

	public function getYingyongAttr($value){
		$values = explode(',', $value);
		$name = [];
		$yingyong = $this->yingyong;
		foreach ($values as $k => $v) {
			if(isset($yingyong[$v]))$name[] = $yingyong[$v];
		}
		return ['value' => $value, 'name' => implode(',', $name)];
	}

}