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
<a href="{{url('/user/create')}}" type="button" style="float:right;" class="btn btn-info">去添加</a>
</center>
<form>
    

</form>
<table class="table table-striped">
	<thead>
		<tr>
            <th>管理员ID</th>
            <th>管理员名称</th>
			<th>管理员电话</th>
			<th>管理员邮箱</th>
			<th>管理员添加时间</th>
            
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($data as $v)
		<tr>
			<td>{{$v->user_id}}</td>
			<td>{{$v->user_name}}</td>
			<td>{{$v->user_tel}}</td>
            <td>{{$v->user_email}}</td>
			<td>{{date('Y-m-d H:i:s',$v->user_time)}}</td>
			<td>
                <a type="button" class="btn btn-warning" href="{{url('/user/destroy/'.$v->user_id)}}" >删除</a>
                <a type="button" class="btn btn-default" href="{{url('/user/edit/'.$v->user_id)}}" >编辑</a>
            </td>
		</tr>
	@endforeach
  <tr><td>{{ $data->links() }}</td></tr>
  
	</tbody>
</table>

</body>
</html>