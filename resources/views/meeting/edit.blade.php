@extends('team.layouts.team')
@section('title','拜访会议')
@section('content')
<center><h2>拜访会议添加</h2></br></center>
<form class="form-horizontal" role="form" method="post" action="{{url('/meeting/update/'.$meetingInfo->m_id)}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">访问人</label>
		<div class="col-sm-10">
			<input type="text" name="m_man" value="{{$meetingInfo->m_man}}" class="form-control" id="firstname" 
				   placeholder="请输入访问人">
			<b style="color:red">{{$errors->first('name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">业务员</label>
		<div class="col-sm-2">
			<select class="form-control" name="s_id" id="firstname">
				<option value="">--请选择--</option>
				@foreach($salesman as $v)
				<option value="{{$v->s_id}}" {{$meetingInfo->s_id=$v->s_id?'selected':''}}>{{$v->s_name}}</option>
				@endforeach
			</select>
			<b style="color:red">{{$errors->first('t_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">客户</label>
		<div class="col-sm-2">
			<select class="form-control" name="c_id" id="firstname">
				<option value="">--请选择--</option>
				@foreach($client as $vo)
				<option value="{{$vo->c_id}}" {{$meetingInfo->c_id=$vo->c_id?'selected':''}}>{{$vo->c_name}}</option>
				@endforeach
			</select>
			<b style="color:red">{{$errors->first('t_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">访问地址</label>
		<div class="col-sm-10">
			<input type="text" name="m_address" value="{{$meetingInfo->m_address}}" class="form-control" id="lastname" 
				   placeholder="请输入访问地址">
			<b style="color:red">{{$errors->first('brand_url')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">访问详情</label>
		<div class="col-sm-10">
			<textarea type="text" name="m_content" class="form-control" id="lastname">{{$meetingInfo->m_content}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-success">修改</button>
			<button type="reset" class="btn btn-danger">重置</button>
		</div>
	</div>
</form>
@endsection