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
<center><h2>登录
</h2>
</center>
<form action="{{url('/login/loginDo')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">用户名</label>
		<div class="col-sm-10">
			<input type="text" name="user_name" class="form-control" id="firstname" 
				   placeholder="请输入用户名">
			<b style="color:red">{{session('msg')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">输入密码</label>
		<div class="col-sm-10">
			<input type="password" name="user_pwd" class="form-control" id="firstname" 
				   placeholder="请输入密码">
			<b style="color:red"></b>
		</div>
	</div>
    
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>

</body>
</html>