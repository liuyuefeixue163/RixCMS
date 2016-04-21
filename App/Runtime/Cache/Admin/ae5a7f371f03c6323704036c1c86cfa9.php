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
		      	<form action="/RixCMS/index.php/Admin/Cate/updateCate/cate_id/4" method="post">
					<table class="table table-bordered  table-hover valign-middle">
						<tr>
							
							<th colspan="2">
							    您正在修改 [
								<a href="javascript:void(0)"><?php echo ($cate['cate_name']); ?></a>
								商品分类名称 ]
							</th>
						</tr>
						
						<tr>
							<td width="40%">分类名称：</td>
							<td width="60%"><input class="form-control" type="text" name="cate_name" value="<?php echo ($cate['cate_name']); ?>"/></td>
						</tr>
						
						<tr>
							<td>分类ID：</td>
							<td><input type="text" class="form-control" name="cate_pid" readonly="readonly"  value="<?php echo ($cate['cate_pid']); ?>"/></td>
						</tr>
						
						<tr>
							<td>分类排序：</td>
							<td><input type="text" class="form-control" name="cate_sort"  value="<?php echo ($cate['cate_sort']); ?>"/></td>
						</tr>
						
						<tr>
							<td colspan="2" class="text-center">
								<input type="hidden" name="cate_id" value="<?php echo ($cate['cate_id']); ?>" />
								<input type="submit" class="btn btn-default " value="保存"/>
							</td>
						</tr>
						
					</table>
					
				</form>
		
		   </div>
		</div>
		
		<!--main javascript-->
		<script src="/RixCMS/App/Admin/Public/bootstrap/js/bootstrap.min.js?v=3.4.0"></script>
	</body>
</html>