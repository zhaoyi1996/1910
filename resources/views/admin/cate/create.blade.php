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
<center><h2>分类管理
</h2>
</center>
<form action="{{url('/cate/store')}}"  enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-10">
			<input type="text" name="cate_name" class="form-control" id="firstname" 
				   placeholder="请输入名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">所属分类</label>
		<div class="col-sm-10">
			<select name="p_id" id="">
				<option value="0">--请选择--</option>
				@foreach($data as $v)
				<option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
    
	<div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio" name="cate_show" value="1" checked id="firstname">显示
			<input type="radio" name="cate_show" value="2" id="firstname">不显示
		</div>
	</div>
	<div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">是否在导航显示</label>
		<div class="col-sm-10">
			<input type="radio" name="cate_nav_show" value="1" checked id="firstname">显示
			<input type="radio" name="cate_nav_show" value="2" id="firstname">不显示
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