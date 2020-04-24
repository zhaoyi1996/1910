<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>石锤品牌</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>品牌管理
<a href="{{url('/user')}}" type="button" style="float:right;" class="btn btn-info">去展示</a>
</h2>
</center>
<form action="{{url('/user/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-10">
			<input type="text" name="user_name" class="form-control" id="firstname" 
				   placeholder="请输入用户名">
			
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">手机号</label>
		<div class="col-sm-10">
			<input type="text" name="user_tel" class="form-control" id="firstname" 
				   placeholder="请输入手机号">
			
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">邮箱</label>
		<div class="col-sm-10">
			<input type="email" name="user_email" class="form-control" id="firstname" 
				   placeholder="请输入邮箱">
			
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="password" name="user_pwd" class="form-control" id="firstname" 
				   placeholder="请输入密码">
			
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>