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