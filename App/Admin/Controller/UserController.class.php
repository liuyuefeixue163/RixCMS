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

	// 登录
	public function doLogin()
 	{
 		//校验验证码
        $verify = new \Think\Verify();
        if(!$verify->check(I("post.code"))){
             $this->error("验证码错误！",U("User/index"));
        }

         //执行登录判断
         $mod = M("admin");
         //获取登录者信息
         $uname = I("post.uname");
         $passwd = md5(I("post.passwd"));
         $user = $mod->where("admin_uname='{$uname}'")->find();
         if($user){
            if($user['admin_statu'] == 1){
                 //验证密码
                if($user['admin_passwd'] == ($passwd)){
                    //此处表示登录成功
                    //将登录成功用户信息放入到session
                    // session("admin",$user);
                    //dump($user);die();
                    session("admin",$user);
                    //dump($_SESSION);die();
                    //$value = session("admin_uname");
                    //dump($value);die();
                    // 保存登录时间和IP地址
                    $user['admin_login_time'] = time();
                    $user['admin_login_ip'] = get_client_ip();
                    M('admin')->save($user);
                    // 跳至首页
                    $this->redirect("Manager/index");
                    exit();
                }else{
                    $this->error("登录失败！请重新登录",U("User/index"));
                    //$this->error("登录密码错误！",U("User/index"));
                }
            }else{
                $this->error("登录失败！请重新登录",U("User/index"));
               // $this->error("账号已被禁用！",U("User/index"));
            }
         }else{
            $this->error("登录失败！请重新登录",U("User/index"));
            //$this->error("登录账号不存在！",U("User/index"));
         }
 	}

	// 退出
 	public function logout()
 	{
 		session(null); // 清除session
 		$this->display("User/index");
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