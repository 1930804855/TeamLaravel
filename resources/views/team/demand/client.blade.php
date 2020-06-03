@extends('team/layouts/team')
@section('title','客户信息查询')
@section('content')
<br>
<center>
    <h2>CRM管理系统-客户查询</h2>
</center>
<form>
  客户名称：<input type="text" name="c_name" value="{{$c_name}}" placeholder="根据客户名称查询" style="height: 30px">
  客户级别：<input type="text" name="c_level" value="{{$c_level}}" placeholder="级别查询（会员，非会员）" style="height: 30px">
  客户从事行业：
  <select name="i_id">
    <option value="">请选择要查询的行业</option>
    @if($industry)
    @foreach($industry as $k=>$v)
      <option value="{{$v->i_id}}" {{$i_id==$v->i_id ? 'selected' : ''}}>{{$v->i_industry}}</option>
    @endforeach
    @endif
  </select>

  客户来源：
  <select name="l_id">
    <option value="">请选择要查询的客户来源</option>
    @if($source)
    @foreach($source as $k=>$v)
      <option value="{{$v->l_id}}" {{$l_id==$v->l_id ? 'selected' : ''}}>{{$v->l_source}}</option>
    @endforeach
    @endif
  </select>

  接待业务员：
  <select name="s_id">
    <option value="">请选择要查询的接待业务员</option>
    @if($salesman)
    @foreach($salesman as $k=>$v)
      <option value="{{$v->s_id}}" {{$s_id==$v->s_id ? 'selected' : ''}}>{{$v->s_name}}</option>
    @endforeach
    @endif
  </select>

  客户手机：<input type="text" name="c_tel" value="{{$c_tel}}" placeholder="根据客户手机查询" style="height: 30px;">

  <button type="submit" class="btn btn-success">查询</button>
</form>
<table class="table">
  <thead>
    <tr>
      <th>客户ID</th>
      <th>客户名称</th>
      <th>客户级别</th>
      <th>客户从事行业</th>
      <th>客户来源</th>
      <th>业务员</th>
      <th>客户电话</th>
      <th>客户手机</th>
    </tr>
  </thead>
  <tbody>
    @if($client)
    @foreach($client as $k=>$v)
    <tr @if($k%2==0) class="active" @else class="success" @endif>
      <td>{{$v->c_id}}</td>
      <td>{{$v->c_name}}</td>
      <td>{{$v->c_level}}</td>
      <td>{{$v->i_industry}}</td>
      <td>{{$v->l_source}}</td>
      <td>{{$v->s_name}}</td>
      <td>{{$v->c_tels}}</td>
      <td>{{$v->c_tel}}</td>
    </tr>
    @endforeach
    @endif
    <tr>
      <td colspan="9">{{$client->appends(['c_name'=>$c_name,'c_level'=>$c_level,'i_id'=>$i_id,'l_id'=>$l_id,'s_id'=>$s_id,'c_tel'=>$c_tel])->links()}}</td>
    </tr>
  </tbody>
</table>
@endsection