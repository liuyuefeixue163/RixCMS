<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
		<title></title>
		<link href="/RixCMS/App/Admin/Public/bootstrap/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    	<link href="/RixCMS/App/Admin/Public/bootstrap/css/css/bootstrap-theme.min.css" rel="stylesheet">
	    <style type="text/css">
	    	.table > tbody > tr > td{vertical-align: middle !important;}
	    	.pages{text-align: center}
                    .pages a,.pages span {
                        display:inline-block;
                        padding:2px 5px;
                        margin:0 1px;
                        border:1px solid #f0f0f0;
                        -webkit-border-radius:3px;
                        -moz-border-radius:3px;
                        border-radius:3px;
                    }
                    .pages a,.pages li {
                        display:inline-block;
                        list-style: none;
                        text-decoration:none; color:#58A0D3;
                    }
                    .pages a.first,.pages a.prev,.pages a.next,.pages a.end{
                        margin:0;
                    }
                    .pages a:hover{
                        border-color:#50A8E6;
                    }
                    .pages span.current{
                        background:#50A8E6;
                        color:#FFF;
                        font-weight:700;
                        border-color:#50A8E6;
                    }
                    .pages .rows{float: right}
	    </style>
	    
	</head>
	<body>
		<div class="breadcrumbs" id="breadcrumbs" >
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb" style="margin: 5 22px 0 12px !important">
				<li>
					<i class="icon-home home-icon"></i>
					<a href="#">首页</a>
				</li>
				<li class="active">123</li>
			</ul><!-- .breadcrumb -->
		</div>
		
		<div class="panel panel-default" style="border:none !important;box-shadow: none !important;">
		   <div class="panel-body">
					<table class="table table-bordered  table-hover valign-middle">
						<tr>
							<th colspan="6">共<span style="color: red;padding: 0pc 2px;"><?php echo ($count); ?></span>个分类</th>
						</tr>
						
						<tr>
							<th>开/收</th>
							<th>ID</th>
							<th>商品名称</th>
							<th>PID</th>
							<th>排序</th>
							<th>操作</th>
						</tr>
						
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><a href="#" style="color:#23527c">+</a></td>
								<td><?php echo ($vo["cate_id"]); ?></td>
								<td><?php echo ($vo["cate_name"]); ?></td>
								<td><?php echo ($vo["cate_pid"]); ?></td>
								<td>
									<input type="text" class="form-control" name="cate_sort"   value="<?php echo ($vo["cate_sort"]); ?>"/>
								</td>
								<td>
									<a class="btn btn-info btn-xs glyphicon glyphicon-plus" href="<?php echo U('Admin/Cate/sonCate',array('cate_id'=>$vo['cate_id']));?>">添加子分类</a>
									<a class="btn btn-warning btn-xs glyphicon glyphicon-pencil" href="<?php echo U('Admin/Cate/updateCate',array('cate_id'=>$vo['cate_id']));?>">修改分类</a>
									<!--<a href="">删除分类</a>-->
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						
					</table>
					
		    	<div class="pages"><?php echo ($show); ?></div>
		   </div>
		</div>
		
		<!--main javascript-->
		<script src="/RixCMS/App/Admin/Public/bootstrap/js/bootstrap.min.js?v=3.4.0"></script>
	</body>
</html>