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
</h2>
</center>
<form action="{{url('/brand/update/'.$data->brand_id)}}"  enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-10">
			<input type="text" name="brand_name" value="{{$data->brand_name}}" class="form-control" id="firstname" 
				   placeholder="请输入名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-10">
			<input type="text" name="brand_url" value="{{$data->brand_url}}" class="form-control" id="firstname" 
				   placeholder="请输入网址">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-10">
        @if($data->brand_img)<img src="{{env('UPLOADS_URL')}}{{$data->brand_img}}" width="100px" alt="">@endif
			<input type="file" name="brand_img"  class="form-control" id="firstname" >
		</div>
	</div>
	<div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-10">
			<textarea type="text" name="brand_desc" class="form-control" id="lastname" 
				   placeholder="请输入介绍">{{$data->brand_desc}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>