<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	//后台公共管理控制器
	// 初始化
	public function _initialize()
	{
		//dump($_SEEION);
		$m = $_SESSION['admin'];

		//dump($m);die();
		if(empty($m)){
			$this->display("user:index");
			exit();
		}
	}
}