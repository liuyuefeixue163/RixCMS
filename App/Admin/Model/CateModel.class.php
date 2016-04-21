<?php
	namespace Admin\Model;
	use Think\Model;
	
	class CateModel extends Model{
			protected $_validate = array(
				//验证商品分类名称不为空
			    array('cate_name','require','商品分类名称不能为空',1), 
			    //在新增的时候验证name字段是否唯一     
			    array('name','','帐号名称已经存在！',0,'unique',1), 
			);
				
			
			
			
			
			
			
					
	}
	
	
?>