<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//引入客户model
use App\Client;
//引入客户从事行业model
use App\Client_industry;
//引入客户来源model
use App\Client_source;
//引入业务员model
use App\Salesman;
//引入拜访会议model
use App\Meeting;

class DemandController extends Controller
{
    //客户信息查询方法
    public function client(){
    	//接值
    	$c_name=request()->c_name;
    	$c_level=request()->c_level;
    	$i_id=request()->i_id;
    	$l_id=request()->l_id;
    	$s_id=request()->s_id;
    	$c_tel=request()->c_tel;
    	//定义搜索条件
    	$where=[];
    	//拼接搜索条件
    	if($c_name){
    		$where[]=['c_name','like',"%$c_name%"];
    	}
    	if($c_level){
    		$where[]=['c_level','=',$c_level];
    	}
    	if($i_id){
    		$where[]=['client.i_id','=',$i_id];
    	}
    	if($l_id){
    		$where[]=['client.l_id','=',$l_id];
    	}
    	if($s_id){
    		$where[]=['client.s_id','=',$s_id];
    	}
    	if($c_tel){
    		$where[]=['c_tel','like',"%$c_tel%"];
    	}
    	//取出分页配置项
        $pageSize=config('app.pageSize');
        //查询数据
        $client=Client::select('c_id','c_name','c_level','i_industry','l_source','s_name','c_tels','c_tel')->join('client_industry','client.i_id','=','client_industry.i_id')->join('client_source','client.l_id','=','client_source.l_id')->join('salesman','client.s_id','=','salesman.s_id')->where($where)->paginate($pageSize);
        //查询客户从事行业
        $industry=Client_industry::get();
        //查询客户来源
        $source=Client_source::get();
        //查询业务员
        $salesman=Salesman::select('s_id','s_name')->get();
        //渲染视图
        return view('team/demand/client',compact('client','industry','source','salesman','c_name','c_level','i_id','l_id','s_id','c_tel'));
    }

    //拜访会议查询方法
   	public function meeting(){
   		//接值
   		$s_id=request()->s_id;
   		$c_name=request()->c_name;
   		$m_man=request()->m_man;
   		$m_address=request()->m_address;
   		//定义搜索条件
   		$where=[];
   		//判断拼接搜索条件
   		if($s_id){
   			$where[]=['meeting.s_id','=',$s_id];
   		}
   		if($c_name){
   			$where[]=['c_name','like',"%$c_name%"];
   		}
   		if($m_man){
   			$where[]=['m_man','like',"%$m_man%"];
   		}
   		if($m_address){
   			$where[]=['m_address','like',"%$m_address%"];
   		}
   		//取出分页配置项
   		$pageSize=config('app.pageSize');
   		//查询数据
   		$meeting=Meeting::select('m_id','s_name','c_name','m_time','m_man','m_address','m_content','m_times')->join('salesman','meeting.s_id','=','salesman.s_id')->join('client','meeting.c_id','=','client.c_id')->where($where)->paginate($pageSize);
   		//查询业务员
        $salesman=Salesman::select('s_id','s_name')->get();
   		//渲染视图
   		return view('team/demand/meeting',compact('meeting','salesman','s_id','c_name','m_man','m_address'));
   	}
}
