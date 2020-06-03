@extends('team.layouts.team')
@section('title','业务员修改')
@section('content')
<br>
<center><h2>CRM管理系统-业务员修改</h2></br></center>
<form class="form-horizontal" role="form" method="post" action="{{url('/salesman/update/'.$salesmanInfo->s_id)}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<input type="text" name="s_name" value="{{$salesmanInfo->s_name}}" class="form-control" id="firstname" 
				   placeholder="请输入业务员名称">
			<b style="color:red">{{$errors->first('name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">性别</label>
		<div class="col-sm-10">
			<input type="radio" name="s_sex" value="1" {{$salesmanInfo->s_sex==1?'checked':''}}>男
			<input type="radio" name="s_sex" value="2" {{$salesmanInfo->s_sex==2?'checked':''}}>女
		</div>
		<b style="color:red">{{$errors->first('is_zy')}}</b>
	</div>
	
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">办公电话</label>
		<div class="col-sm-10">
			<input type="text" name="s_tels" value="{{$salesmanInfo->s_tels}}" class="form-control" id="lastname" 
				   placeholder="请输入办公电话">
			<b style="color:red">{{$errors->first('brand_url')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">手机</label>
		<div class="col-sm-10">
			<input type="text" name="s_tel" value="{{$salesmanInfo->s_tel}}" class="form-control" id="lastname" 
				   placeholder="请输入手机">
			<b style="color:red">{{$errors->first('brand_url')}}</b>
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