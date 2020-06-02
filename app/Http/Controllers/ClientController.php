<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//引入客户从事行业model
use App\Client_industry;
//引入客户来源model
use App\Client_source;
//引入业务员model
use App\Salesman;
//引入客户model
use App\Client;
//引入Rule类
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * 展示方法
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //取出分页配置项
        $pageSize=config('app.pageSize');
        //查询数据
        $client=Client::select('c_id','c_name','c_level','i_industry','l_source','s_name','c_tels','c_tel')->join('client_industry','client.i_id','=','client_industry.i_id')->join('client_source','client.l_id','=','client_source.l_id')->join('salesman','client.s_id','=','salesman.s_id')->paginate($pageSize);
        //渲染视图
        return view('team/client/index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询客户从事行业
        $industry=Client_industry::get();
        //查询客户来源
        $source=Client_source::get();
        //查询业务员
        $salesman=Salesman::select('s_id','s_name')->get();
        //渲染视图
        return view('team/client/create',compact('industry','source','salesman'));
    }

    /**
     * Store a newly created resource in storage.
     * 执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接值
        $data=$request->except('_token');
        //表单验证
        $validatedData = $request->validate([
            'c_name' => 'required|unique:client',
            'c_level' => 'required',
            'i_id'=>'required',
            'l_id'=>'required',
            's_id'=>'required',
            'c_tel'=>'required'
        ],[
            'c_name.required'=>'客户名称不可为空，请填写。',
            'c_name.unique'=>'该客户名称已存在，请重新填写。',
            'c_level.required'=>'客户级别不可为空，请填写。',
            'i_id.required'=>'请选择客户从事行业。',
            'l_id.required'=>'请选择客户来源。',
            's_id.required'=>'请选择业务员。',
            'c_tel.required'=>'客户手机不可为空，请填写。'
        ]);
        //添加入库
        $res=Client::insert($data);
        //判断跳转
        if($res){
            return redirect('client');
        }
    }

    /**
     * Display the specified resource.
     * 预览详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询数据
        $edit=Client::find($id);
        //查询客户从事行业
        $industry=Client_industry::get();
        //查询客户来源
        $source=Client_source::get();
        //查询业务员
        $salesman=Salesman::select('s_id','s_name')->get();
        //渲染视图
        return view('team/client/edit',compact('industry','source','salesman','edit'));
        
    }

    /**
     * Update the specified resource in storage.
     * 执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接值
        $data=$request->except('_token');
        //表单验证
        $validatedData = $request->validate([
            'c_name' =>[
                'required',
                Rule::unique('client')->ignore($id,'c_id'),
            ],
            'c_level' => 'required',
            'i_id'=>'required',
            'l_id'=>'required',
            's_id'=>'required',
            'c_tel'=>'required'
        ],[
            'c_name.required'=>'客户名称不可为空，请填写。',
            'c_name.unique'=>'该客户名称已存在，请重新填写。',
            'c_level.required'=>'客户级别不可为空，请填写。',
            'i_id.required'=>'请选择客户从事行业。',
            'l_id.required'=>'请选择客户来源。',
            's_id.required'=>'请选择业务员。',
            'c_tel.required'=>'客户手机不可为空，请填写。'
        ]);
        //修改
        $res=Client::where('c_id',$id)->update($data);
        //判断跳转
        if($res!==false){
            return redirect('client');
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除
        $res=Client::destroy($id);
        //判断跳转
        if($res){
            return redirect('client');
        }
    }
}
