<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
	//后台管理控制器	
    public function index(){
    	if(!empty($_POST)){
    		print_r($_POST);
    	}
		    		     
		$this->display();
	}
	
	/*验证码*/
	public function verify(){
		$config = array( 'fontSize'    =>    30, 
		    // 验证码字体大小  
		    'length'      =>    4,  
		    // 验证码位数  
		    //'useNoise'    =>    false, 
		    // 关闭验证码杂点
		);
        $Verify =     new \Think\Verify($config);
	    $Verify->useImgBg = true; 
        $Verify->entry();
	}
}