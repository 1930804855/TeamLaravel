@extends('team.layouts.team')
@section('title','业务员添加')
@section('content')
<center><h2>业务员添加</h2></br></center>
<form class="form-horizontal" role="form" method="post" action="{{url('/salesman/store')}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<input type="text" name="s_name" class="form-control" id="firstname" 
				   placeholder="请输入业务员名称">
			<b style="color:red">{{$errors->first('s_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">性别</label>
		<div class="col-sm-10">
			<input type="radio" name="s_sex" value="1">男
			<input type="radio" name="s_sex" value="2">女
		</div>
		<b style="color:red">{{$errors->first('s_sex')}}</b>
	</div>
	
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">办公电话</label>
		<div class="col-sm-10">
			<input type="text" name="s_tels" class="form-control" id="lastname" 
				   placeholder="请输入办公电话">
			<b style="color:red">{{$errors->first('s_tels')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">手机</label>
		<div class="col-sm-10">
			<input type="text" name="s_tel" class="form-control" id="lastname" 
				   placeholder="请输入手机">
			<b style="color:red">{{$errors->first('s_tel')}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-success">提交</button>
			<button type="reset" class="btn btn-danger">重置</button>
		</div>
	</div>
</form>
@endsection