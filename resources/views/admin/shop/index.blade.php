<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>强大的人类</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">酷比</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li  class="active"><a href="{{url('/goods')}}">商品管理</a></li>
        <li><a href="{{url('/brand')}}">品牌管理</a></li>
        <li><a href="{{url('/cart')}}">分类管理</a></li>
		<li><a href="{{url('/user')}}">管理员管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h2>商品管理</h2>
<a href="{{url('/shop/create')}}" type="button" style="float:right;" class="btn btn-info">去添加</a>
</center>
<form>
    商品名称：<input type="text" name="name">
    商品分类：<select name="cate_id" id="">
        <option value="0">--请选择--</option>
        @foreach($CateInfo as $v)
        <option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
        @endforeach
    </select>
    商品品牌：<select name="brand_id" id="">
        <option value="0">--请选择--</option>
        @foreach($BrandInfo as $v)
        <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
        @endforeach
    </select>
    商品价格：<input type="text" name="min" id="">-
            <input type="text" name="max" id="">
    <input type="submit" value="搜索" id="">
</form>
<table class="table table-striped">
	<thead>
		<tr>
            <th>商品ID</th>
			<th>商品名称</th>
			<th>商品分类</th>
			<th>商品品牌</th>
            <th>商品价格</th>
            <th>商品库存</th>
            <th>赠送积分</th>
            <th>是否显示</th>
            <th>是否新品</th>
            <th>是否热卖</th>
            <th>是否精品</th>
            <th>商品主图</th>
            <th>商品图片</th>
            <th>商品详情</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($data as $v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->cate_name}}</td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->goods_price}}</td>
            <td>{{$v->goods_num}}</td>
            <td>{{$v->goods_score}}</td>
            <td>{{$v->is_up==1?'√':'×'}}</td>
            <td>{{$v->is_new==1?'√':'×'}}</td>
            <td>{{$v->is_hot==1?'√':'×'}}</td>
            <td>{{$v->is_best==1?'√':'×'}}</td>
            <td>@if($v->goods_img)<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width="100px" alt="">@endif</td>
            <td>
            @if(!empty($v->goods_imgs))
                @foreach($v->goods_imgs as $k=>$val)
                    @if($val)<img src="{{env('UPLOADS_URL')}}{{$val}}" width="50px" alt="">@endif
                @endforeach
            @endif
            
            
            </td>
			<td>{{$v->goods_desc}}</td>
			<td>
                <a type="button" class="btn btn-warning" href="{{url('/shop/destroy/'.$v->goods_id)}}" >删除</a>
                <a type="button" class="btn btn-default" href="{{url('/shop/edit/'.$v->goods_id)}}" >编辑</a>
            </td>
		</tr>
	@endforeach
  <tr><td>{{ $data->links() }}</td></tr>
  
	</tbody>
</table>

</body>
</html>