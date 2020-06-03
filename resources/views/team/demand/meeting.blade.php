@extends('team/layouts/team')
@section('title','客户信息查询')
@section('content')
<br>
<center>
    <h2>CRM管理系统-客户拜访会议查询</h2>
</center>
<form>
	业务员：
	  <select name="s_id">
	    <option value="">请选择要查询的业务员</option>
	    @if($salesman)
	    @foreach($salesman as $k=>$v)
	      <option value="{{$v->s_id}}" {{$s_id==$v->s_id ? 'selected' : ''}}>{{$v->s_name}}</option>
	    @endforeach
	    @endif
	  </select>
	客户名称：<input type="text" name="c_name" value="{{$c_name}}" placeholder="根据客户名称查询" style="height: 30px;">
	访问人：<input type="text" name="m_man" value="{{$m_man}}" placeholder="根据访问人查询" style="height: 30px;">
	访问地址：<input type="text" name="m_address" value="{{$m_address}}" placeholder="根据访问地址查询" style="height: 30px;">
	<button type="submit" class="btn btn-success">查询</button>
</form>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>业务员名称</th>
      <th>客户名称</th>
      <th>访问时间</th>
      <th>访问人</th>
      <th>访问地址</th>
      <th>访问详情</th>
      <th>下次访问时间</th>
    </tr>
  </thead>
  <tbody>
    @if($meeting)
    @foreach($meeting as $k=>$v)
    <tr @if($k%2==0) class="active" @else class="success" @endif>
      <td>{{$v->m_id}}</td>
      <td>{{$v->s_name}}</td>
      <td>{{$v->c_name}}</td>
      <td>{{date('Y-m-d H:i:s',$v->m_time)}}</td>
      <td>{{$v->m_man}}</td>
      <td>{{$v->m_address}}</td>
      <td>{{$v->m_content}}</td>
      <td>{{date('Y-m-d H:i:s',$v->m_times)}}</td>
    </tr>
    @endforeach
    @endif
    <tr>
      <td colspan="9">{{$meeting->appends(['s_id'=>$s_id,'c_name'=>$c_name,'m_man'=>$m_man,'m_address'=>$m_address])->links()}}</td>
    </tr>
  </tbody>
</table>
@endsection