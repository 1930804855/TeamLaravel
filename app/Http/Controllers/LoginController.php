<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin;

class LoginController extends Controller
{
    public function index(){
        return view('team.login');
    }
    public function logindo(){
        $post = request()->except('_token');

        $admin = Admin::where('admin_name',$post['admin_name'])->first();

        if(!$admin){
            return redirect('/login')->with('msg','用户名或密码错误');
        }
         
        if(decrypt($admin->admin_pwd)!=$post['admin_pwd']){
            return redirect('/login')->with('msg','用户名或密码错误'); 
        }

        /**判断七天免登录 */
        if(isset($post['isremember'])){
            Cookie::queue('admin',serialize($admin),60*24*7);
        }

        session(['admin'=>$admin]);

        return redirect('/admin/index');
    }

    /**退出登录 */
    public function loginout(){
        request()->session()->flush();
        return redirect('/login');
    }
}
