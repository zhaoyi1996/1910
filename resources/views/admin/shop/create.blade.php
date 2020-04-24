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
<center><h2>商品管理
</h2>
</center>
<form action="{{url('/shop/store')}}"  enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-10">
			<input type="text" name="goods_name" class="form-control" id="firstname" 
				   placeholder="请输入名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-10">
			<select name="cate_id" id="">
				<option value="0">--请选择--</option>
				@foreach($Catedata as $v)
				<option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-10">
			<select name="brand_id" id="">
				<option value="0">--请选择--</option>
				@foreach($BrandData as $v)
				<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-10">
			<input type="text" name="goods_price" class="form-control" id="firstname" 
				   placeholder="请输入价格">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-10">
			<input type="text" name="goods_num" class="form-control" id="firstname" 
				   placeholder="请输入库存数量">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">赠送积分</label>
		<div class="col-sm-10">
			<input type="text" name="goods_score" class="form-control" id="firstname" 
				   placeholder="请输入赠送积分">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio" name="is_up" value="1" checked id="firstname">显示
			<input type="radio" name="is_up" value="2" id="firstname">不显示
		</div>
	</div>
	<div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-10">
			<input type="radio" name="is_new" value="1" checked id="firstname">是
			<input type="radio" name="is_new" value="2" id="firstname">否
		</div>
	</div>
    <div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">是否热卖</label>
		<div class="col-sm-10">
			<input type="radio" name="is_hot" value="1" checked id="firstname">是
			<input type="radio" name="is_hot" value="2" id="firstname">否
		</div>
	</div>
    <div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-10">
			<input type="radio" name="is_best" value="1" checked id="firstname">是
			<input type="radio" name="is_best" value="2" id="firstname">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">商品主图</label>
		<div class="col-sm-10">
			<input type="file" name="goods_img" class="form-control" id="firstname">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">商品图片</label>
		<div class="col-sm-10">
			<input type="file" name="goods_imgs[]" class="form-control" multiple="multiple" id="firstname">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname"  class="col-sm-2 control-label">商品详情</label>
		<div class="col-sm-10">
			<textarea type="text" name="goods_desc" class="form-control" id="firstname" 
				   placeholder="请输入商品详情"></textarea>
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