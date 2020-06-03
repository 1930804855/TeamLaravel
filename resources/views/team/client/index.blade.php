@extends('team/layouts/team')
@section('title','客户展示')
@section('content')
<br>
<center>
    <h2>CRM管理系统-客户展示</h2>
</center>
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
      <th>操作</th>
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
      <td>
        <a href="{{url('client/edit/'.$v->c_id)}}"><button type="button" class="btn btn-info">修改</button></a>
        <a href="{{url('client/destroy/'.$v->c_id)}}"><button type="button" class="btn btn-danger">删除</button></a>
      </td>
    </tr>
    @endforeach
    @endif
    <tr>
      <td colspan="9">{{$client->links()}}</td>
    </tr>
  </tbody>
</table>
@endsection