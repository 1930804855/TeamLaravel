@extends('team.layouts.team')
@section('title','管理员列表')
@section('content')

<center>
<br>
<h1>管理员展示</h1>
<table class="table">
	<thead>
		<tr>
			<th>管理员ID</th>
			<th>管理员名称</th>
			<th>角色</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach ($adminInfo as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<td>{{$v->admin_id}}</td>
			<td>{{$v->admin_name}}</td>
			<td>{{$v->r_roles}}</td>
			<td>
				<a class="btn btn-primary" href="{{url('admin/edit/'.$v->admin_id)}}">编辑</a>|<a class="btn btn-danger" href="{{url('admin/destroy/'.$v->admin_id)}}">删除</a>
			</td>
		</tr>
        @endforeach
        <tr>
			<td colspan=14 align="center">{{$adminInfo->links()}}</td>
		</tr>
	</tbody>
</table>
</center>
@endsection
