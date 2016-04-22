<?php

namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {
	//后台管理控制器
	//分类列表
		
    public function index(){
//		$Category = new \Org\Util\Category; 
//		$cate=M("cate")->select();
//		$m=$Category::unlimitedForLevel($cate,'&nbsp;&nbsp;--');
//		p($m);die;
		
		
		$cate=M("cate")->select();
		$this->assign("data",$cate);
		
    	//分页
//		$model = M('cate'); // 实例化User对象
//		$count = $model->count();// 查询满足要求的总记录数
//		$Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(2)
//		
//		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
//      $Page->setConfig('prev', '上一页');
//      $Page->setConfig('next', '下一页');
//      $Page->setConfig('last', '末页');
//      $Page->setConfig('first', '首页');
//      $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
//      $Page->lastSuffix = false;//最后一页不显示为总页数;
//		
//		$show  = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//		$list  = $model->limit($Page->firstRow.','.$Page->listRows)->select();
//		$this->assign('data',$list);// 赋值数据集$this->assign('page',$show);// 赋值分页输出$this->display(); // 输出模板
//		$this->assign("show",$show);
//		$this->assign("count",$count);
		
		
		$this->display();
		
	}
	
	//添加商品分类
	public function addCate(){
//		$model=D("cate");
		$model=M("cate");
		if(!empty($_POST)){
			$data['cate_name']=I("post.cate_name",0);
			$data['cate_pid']=I("post.cate_pid",0);
			$data['cate_sort']=I("post.cate_sort",0);
			
			if($model->add($data)){
				$this->redirect('index', 5, '操作成功');
			}else{
				$this->error("操作失败");
			}
		}
		
		$this->display();
	}
	
	//添加商品子分类
	public function sonCate(){
		$model=M("cate");
		
		//分配变量
		if(IS_GET && !empty($_GET)){
			$cate_id=I("get.cate_id",0);
			$cate_name=$model->where(array("cate_id"=>$cate_id))->field('cate_name')->find();
			//p($cate_name);die;
			$this->assign("cate",$cate_name);
			$this->assign("cate_id",$cate_id);
		}
		
		//处理子级分类表单
		if(!empty($_POST)){
			$data['cate_name']=I("post.cate_name",0);
			$data['cate_pid']=I("post.cate_pid",0);
			$data['cate_sort']=I("post.cate_sort",0);
			
			if($model->add($data)){
				$this->redirect('index');
			}else{
				$this->error("操作失败");
			}
		}
		
		
		$this->display();
	}
	
	//修改商品分类
	public function updateCate(){
		$model=M("cate");
		//分配变量
		if(IS_GET && !empty($_GET)){
			$cate_id=I("get.cate_id",0);
			$cate=$model->where(array("cate_id"=>$cate_id))->find();
			$this->assign("cate",$cate);
		}
		
		if(IS_POST && !empty($_POST)){
			$cate_id=I("cate_id",0);		
			$data=array(
				"cate_name" =>$_POST["cate_name"],
				"cate_pid"  =>$_POST["cate_pid"],
				"cate_sort" =>$_POST["cate_sort"],
			);
			
			$where=array(
				"cate_id"=>$cate_id,
			);
			
			$model->where($where)->save($data);
			$this->redirect("index");
		}
		$this->display();
	}
	
	
	
}