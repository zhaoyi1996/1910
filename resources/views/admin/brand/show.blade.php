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
        <li><a href="{{url('/shop')}}">商品管理</a></li>
        <li  class="active"><a href="{{url('/brand')}}">品牌管理</a></li>
        <li><a href="{{url('/cart')}}">分类管理</a></li>
		<li><a href="{{url('/user')}}">管理员管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h2>品牌管理</h2>
<a href="{{url('/brand/create')}}" type="button" style="float:right;" class="btn btn-info">去添加</a>
</center>
<form>
    品牌名称：<input type="text" name="name" value="{{$name}}">
    <input type="submit" value="搜索">

</form>
<table class="table table-striped">
	<thead>
		<tr>
            <th>品牌ID</th>
			<th>品牌名称</th>
			<th>品牌网址</th>
			<th>品牌LOGO</th>
            <th>品牌介绍</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody id="show">
    @foreach($data as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
            <td>@if($v->brand_img)<img src="{{env('UPLOADS_URL')}}{{$v->brand_img}}" width="100px" alt="">@endif</td>
			<td>{{$v->brand_desc}}</td>
			<td>
                <a type="button" class="btn btn-warning" href="{{url('/brand/destroy/'.$v->brand_id)}}"  >删除</a>
                <a type="button" class="btn btn-default" href="{{url('/brand/edit/'.$v->brand_id)}}" >编辑</a>
            </td>
		</tr>
	@endforeach
  <tr><td id="page">{{ $data->appends(['name'=>$name])->links() }}</td></tr>
  
	</tbody>
</table>

</body>
</html>
<script>
    $(function(){
      $(document).on('click','.page-link',function(){
        // alert(111);
        var _this=$(this);
        var page=_this.attr('href');
        // console.log(page);
        $.get(url,function(result){
          // $('#show').html(res);
          alert(result);
        })
        return false;
      })
    })
</script>