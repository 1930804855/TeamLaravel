@extends('team/layouts/team')
@section('title','添加客户')
@section('content')
<br>
  <center>
      <h2>CRM管理系统-客户添加页面</h2>
  </center>
  <form class="form-horizontal" role="form" action="{{url('client/update/'.$edit->c_id)}}" method="post">
    @csrf
    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">客户名称：</label>
      <div class="col-sm-9">
        <input type="text" name="c_name" value="{{$edit->c_name}}" class="form-control" id="firstname" placeholder="请输入客户名称">
        <b style="color:red">{{$errors->first('c_name')}}</b>
      </div>
    </div>
    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">客户级别：</label>
      <div class="col-sm-9">
        <input type="text" name="c_level" value="{{$edit->c_level}}" class="form-control" id="lastname" placeholder="请输入客户级别（会员，非会员）">
        <b style="color:red">{{$errors->first('c_level')}}</b>
      </div>
    </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">客户从事行业：</label>
      <div class="col-sm-5">
        <select name="i_id" class="form-control">
          <option value="">请选择客户从事行业</option>
          @if($industry)
          @foreach($industry as $k=>$v)
            <option value="{{$v->i_id}}" {{$edit->i_id==$v->i_id ? 'selected' : ''}}>{{$v->i_industry}}</option>
          @endforeach
          @endif
        </select>
        <b style="color:red">{{$errors->first('i_id')}}</b>
      </div>
    </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">客户来源：</label>
      <div class="col-sm-5">
        <select name="l_id" class="form-control">
          <option value="">请选择客户来源</option>
          @if($source)
          @foreach($source as $k=>$v)
            <option value="{{$v->l_id}}" {{$edit->l_id==$v->l_id ? 'selected' : ''}}>{{$v->l_source}}</option>
          @endforeach
          @endif
        </select>
        <b style="color:red">{{$errors->first('l_id')}}</b>
      </div>
    </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">业务员：</label>
      <div class="col-sm-5">
        <select name="s_id" class="form-control">
          <option value="">请选择客户的业务员</option>
          @if($salesman)
          @foreach($salesman as $k=>$v)
            <option value="{{$v->s_id}}" {{$edit->s_id==$v->s_id ? 'selected' : ''}}>{{$v->s_name}}</option>
          @endforeach
          @endif
        </select>
        <b style="color:red">{{$errors->first('s_id')}}</b>
      </div>
    </div>
    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">客户电话：</label>
      <div class="col-sm-9">
        <input type="text" name="c_tels" value="{{$edit->c_tels}}" class="form-control" id="lastname" placeholder="请输入客户电话">
      </div>
    </div>
    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">客户手机：</label>
      <div class="col-sm-9">
        <input type="text" name="c_tel" value="{{$edit->c_tel}}" class="form-control" id="lastname" placeholder="请输入客户手机">
        <b style="color:red">{{$errors->first('c_tel')}}</b>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">保存</button>
      </div>
    </div>
  </form>
@endsection