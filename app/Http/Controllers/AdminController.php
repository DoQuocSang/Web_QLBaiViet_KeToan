<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }

    public function dashboard(Request $request ){
        $admin_username = $request->admin_username;
        $admin_password = md5($request->admin_password);
        
        $result = DB::table('tbl_admin')
        -> where('admin_username', $admin_username)
        -> where('admin_password', $admin_password)
        -> first();

        if($result){
            Session::put('admin_username', $result->admin_username);
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_password', $result->admin_password);
            Session::put('admin_role', $result->admin_role);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai!');
            // echo'<pre>';
            // print_r( $result);
            // echo'</pre>';
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        Session::put('admin_username', null);
        Session::put('admin_name', null);
        Session::put('admin_password', null);
        Session::put('admin_role', null);
        return Redirect::to('/admin');
    }
}
