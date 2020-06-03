@extends('team.layouts.team')
@section('title','管理员添加')
@section('content')

<form class="form-horizontal" role="form" method="post" action="{{url('/admin/update/'.$adminInfo->admin_id)}}" enctype="multipart/form-data">
    @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="admin_name" value="{{$adminInfo->admin_name}}" id="firstname" 
				   placeholder="请输入管理员名称">
				   <!-- 第二种验证方式 -->
				   <span style="color:red">{{$errors->first('admin_name')}}</span>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员密码</label>
		<div class="col-sm-5">
			<input type="password" class="form-control" name="admin_pwd" value="{{$adminInfo->admin_pwd}}" id="lastname"
			placeholder="请输入管理员密码">
			<!-- 第二种验证方式 -->
			<span style="color:red">{{$errors->first('admin_pwd')}}</span>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员角色</label>
		<div class="col-sm-5">
				<select name="r_id">
                    <option value="">--请选择--</option>
                    @foreach($rolesInfo as $k=>$v)
                        <option value="{{$v->r_id}}" @if($v->r_id==$adminInfo->r_id) selected @endif >{{$v->r_roles}}</option>
                    @endforeach    
                </select>
                <span style="color:red">{{$errors->first('r_id')}}</span>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-5">
			<button type="submit" class="btn btn-default">提交</button>
		</div>
	</div>
</form>
@endsection


