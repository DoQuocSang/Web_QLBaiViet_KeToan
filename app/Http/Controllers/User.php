<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class User extends Controller
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
        $edit_user = DB::table('tbl_user')->where('id',$user_id)->first();
        $manager_user=view('admin.edit_user')->with('edit_user',$edit_user);
        return view('admin_layout')->with('admin.edit_user',$manager_user);
    }
    public function save_user(Request $request){
       $data=array();
       $data['name'] = $request->name;  
       $data['email'] = $request->email;          
       $data['password'] = $request->password; 
       $data['remember_token']=$request->remember_token;               

        DB::table('tbl_user')->insert($data);
        Session::put('message','Thêm người dùng thành công!');
        return Redirect::to ('all-user');
    }
    public function update_user(Request $request,$user_id){
        $data=array();
        $data['name'] = $request->name;  
        $data['email'] = $request->email;          
        $data['password'] = $request->password; 
        $data['remember_token']=$request->remember_token;
        DB::table('tbl_user')->where('id',$user_id)->update($data);
        return Redirect::to ('all-user');
    }
}