@extends('team.layouts.team')
@section('title','拜访会议')
@section('content')
<center><h2>拜访会议列表</h2></br></center>
<table class="table">
	<thead>
		<tr>
			<th><input type="checkbox"></th>
			<th>ID</th>
			<th>拜访人</th>
			<th>业务员</th>
			<th>客户</th>
			<th>访问地址</th>
			<th>访问时间</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($meeting as $k => $v)
		<tr @if($k%2==0) class="active" @else class="danger"@endif>
			<td><input type="checkbox"></td>
			<td>{{$v->m_id}}</td>
			<td>{{$v->m_man}}</td>
			<td>{{$v->s_name}}</td>
			<td>{{$v->c_name}}</td>
			<td>{{$v->m_address}}</td>
			<td>{{date('Y-m-d H:i:s',$v->m_time)}}</td>
			<td>
				<a class="btn btn-primary" href="{{url('meeting/edit/'.$v->m_id)}}">编辑</a>
				<a class="btn btn-danger" href="{{url('meeting/destroy/'.$v->m_id)}}">删除</a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="8" align="center">{{$meeting->links()}}</td>
		</tr>
	</tbody>
</table>

@endsection