<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin;
use App\Roles;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
        $rolesInfo = Roles::get();
        $adminInfo = Admin::join('admin_roles','admin.r_id','=','admin_roles.r_id')->paginate($pageSize);
        return view('team.admin.index',['adminInfo'=>$adminInfo,'rolesInfo'=>$rolesInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $rolesInfo = Roles::get();
        return view('team.admin.create',['rolesInfo'=>$rolesInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**验证 */
        $validatedData = $request->validate([ 
                 
                'admin_name' => 'required',
                'admin_pwd' => 'required',
            ],[
                'admin_name.required'=>'管理员名称必填',
                'admin_pwd.required'=>'管理员密码必填',
            ]);


        $post = $request->except('_token');
        $post['admin_pwd'] = encrypt($post['admin_pwd']);
        // dump($post);

        //ORM添加
        $res = Admin::insert($post);

        if($res){
            return redirect('/admin/index');
        }else{
            return redirect('/admin/create');
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
     *修改视图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolesInfo = Roles::get();
        $adminInfo = Admin::find($id);
        $adminInfo->admin_pwd = decrypt($adminInfo->admin_pwd);
        return view('team.admin.edit',['adminInfo'=>$adminInfo,'rolesInfo'=>$rolesInfo]);
    }

    /**
     * Update the specified resource in storage.
     *修改执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->except('_token');

        $res = Admin::where('admin_id',$id)->update($post);

        if($res!==false){
            return redirect('/admin/index');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Admin::destroy($id);
        if($res){
            return redirect('/admin/index');  
        }
    }
}
