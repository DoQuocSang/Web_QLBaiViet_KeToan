<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

session_start();

class UserController extends Controller
{
    public function all_user(){
        //return view('admin.all_user');
        $all_user = DB::table('tbl_user')->get();
        $manager_user=view('admin.all_user')->with('all_user',$all_user);
        return view('admin_layout')->with('admin.all',$manager_user);
    } 

    public function add_user(){
        return view('admin.add_user');
    }
    public function edit_user($user_id){
       //    return view('admin.edit_user');
        $edit_user = DB::table('tbl_user')->where('user_id',$user_id)->first();
        $manager_user=view('admin.edit_user')->with('edit_user',$edit_user);
        return view('admin_layout')->with('admin.edit_user',$manager_user);
    }
    public function save_user(Request $request){
       $data=array();
       $data['user_name'] = $request->user_name;  
       $data['user_email'] = $request->user_email;          
       $data['user_password'] = $request->user_password; 
       $data['remember_token']=$request->remember_token;               

        DB::table('tbl_user')->insert($data);
        Session::flash('success', 'Thêm người dùng thành công!');
        return Redirect::to ('all-user');
    }
    public function update_user(Request $request,$user_id){
        $data=array();
        $data['user_name'] = $request->user_name;  
        $data['user_email'] = $request->user_email;          
        $data['user_password'] = $request->user_password; 
        $data['remember_token']=$request->remember_token;
        DB::table('tbl_user')->where('user_id',$user_id)->update($data);
        Session::flash('success', 'Cập nhật người dùng thành công!');
        return Redirect::to ('all-user');
    }
    public function delete_user(Request $request,$user_id){
        DB::table('tbl_user')->where('user_id', $user_id)->delete();
        Session::flash('success', 'Xóa người dùng thành công!');
        return Redirect::to ('all-user');
    }
}