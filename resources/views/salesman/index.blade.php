@extends('team.layouts.team')
@section('title','业务员展示')
@section('content')
<br>
<center><h2>CRM管理系统-业务员列表</h2></br></center>
<table class="table">
	<thead>
		<tr>
			<th><input type="checkbox"></th>
			<th>ID</th>
			<th>业务员名称</th>
			<th>性别</th>
			<th>办公电话</th>
			<th>手机号</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($salesman as $k => $v)
		<tr @if($k%2==0) class="active" @else class="danger"@endif>
			<td><input type="checkbox"></td>
			<td>{{$v->s_id}}</td>
			<td>{{$v->s_name}}</td>
			<td>{{$v->s_sex==1 ? '男':'女'}}</td>
			<td>{{$v->s_tels}}</td>
			<td>{{$v->s_tel}}</td>
			<td>
				<a class="btn btn-primary" href="{{url('salesman/edit/'.$v->s_id)}}">编辑</a>
				<a class="btn btn-danger" href="{{url('salesman/destroy/'.$v->s_id)}}">删除</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td align="center" colspan="7">{{$salesman->links()}}</td>
		</tr>
	</tbody>
</table>

@endsection