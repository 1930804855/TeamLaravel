<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Salesman;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
        $salesman = Salesman::orderBy('s_id','desc')->paginate($pageSize);
        return view("salesman.index",['salesman'=>$salesman]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesman.create');
    }

    /**
     * Store a newly created resource in storage.
     * 执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            's_name' => 'required|unique:salesman', 
            's_tel' => 'required', 
            's_tel' => 'regex:/^1[3456789]\d{9}$/',
            's_tels' => 'regex:/^1[3456789]\d{9}$/',
        ],[
            's_name.required' =>"业务员名称必填",
            's_name.unique' =>'业务员名称已存在',
            's_tel.required' =>'手机号必填',
            's_tel.regex' => '请正确填写手机号',
            's_tels.regex' => '请正确填写办公电话',
        ]);
        
        //接收值
        $data = $request ->except('_token');
        $res = Salesman::insert($data);
        if($res){
            return redirect('salesman/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesmanInfo = Salesman::find($id);
        return view('salesman.edit',['salesmanInfo'=>$salesmanInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接收值
         $data = $request ->except('_token');
        $res = Salesman::where("s_id",$id) ->update($data);

        if($res!==false){
            return redirect('salesman/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Salesman::destroy($id);
        if($res){
            return redirect('salesman/index');
        }
    }


}
