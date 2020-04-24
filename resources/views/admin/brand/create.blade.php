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
<a href="{{url('/brand')}}" type="button" style="float:right;" class="btn btn-info">去展示</a>
</h2>
</center>
<form action="{{url('/brand/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-10">
			<input type="text" name="brand_name" class="form-control" id="firstname" 
				   placeholder="请输入名称">
			<b style="color:red">{{$errors->first('brand_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-10">
			<input type="text" name="brand_url" class="form-control" id="firstname" 
				   placeholder="请输入网址">
			<b style="color:red">{{$errors->first('brand_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-10">
			<input type="file" name="brand_img" class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-10">
			<textarea type="text" name="brand_desc" class="form-control" id="lastname" 
				   placeholder="请输入介绍"></textarea>
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