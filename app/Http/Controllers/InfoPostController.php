<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class InfoPostController extends Controller
{
    public function AuthLogin(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return redirect::to('/admin')->send();
        }
    }

    public function add_info_post(){
        $this->AuthLogin();
        return view('admin.info_post.add_info_post');
    }

    public function all_info_post(){
        $this->AuthLogin();
        $all_info_post = DB::table('tbl_info_post')
        ->orderby('tbl_info_post.info_post_id','desc')->get();
        // ->orderby('tbl_info_post.info_post_index','asc')->get();
        $manager_info_post = view('admin.info_post.all_info_post')->with('all_info_post', $all_info_post);
        
        return view('admin_layout')->with('admin.info_post.all_info_post', $manager_info_post);
    }

    public function save_info_post(Request $request){
        $this->AuthLogin();
        $data = array();
        // $data['info_post_index'] = $request->info_post_index;
        $data['info_post_title'] = $request->info_post_title;
        $data['info_post_content'] = $request->info_post_content;
        $data['info_post_status'] = $request->info_post_status;
        $data['info_post_author'] = Session::get('admin_name');
        $data['is_default'] = $request->has('is_default');
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_info_post')->insert($data);

        Session::put('message', 'Thêm trang thông tin thành công!');
        return Redirect::to('/add-info-post');
    }

    public function active_info_post($info_post_id){
        $this->AuthLogin();
        DB::table('tbl_info_post')->where('info_post_id',$info_post_id)->update(['info_post_status'=>1]);
        Session::put('message', 'Kích hoạt trang thông tin thành công!');
        return Redirect::to('/all-info-post');
    }

    public function unactive_info_post($info_post_id){
        $this->AuthLogin();
        DB::table('tbl_info_post')->where('info_post_id',$info_post_id)->update(['info_post_status'=>0]);
        Session::put('message', 'Bỏ kích hoạt trang thông tin thành công!');
        return Redirect::to('/all-info-post');
    }

    public function edit_info_post($info_post_id){
        $this->AuthLogin();
        $edit_info_post = DB::table('tbl_info_post')->where('info_post_id',$info_post_id)->get();
        $manager_info_post = view('admin.info_post.edit_info_post')
        ->with('edit_info_post', $edit_info_post);
        return view('admin_layout')->with('admin.info_post.edit_info_post', $manager_info_post);
    }

    public function update_info_post(request $request, $info_post_id){
        $this->AuthLogin();
        $data = array();
        // $data['info_post_index'] = $request->info_post_index;
        $data['info_post_title'] = $request->info_post_title;
        $data['info_post_content'] = $request->info_post_content;
        $data['is_default'] = $request->has('is_default');
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_info_post')->where('info_post_id',$info_post_id)->update($data);
        session::put('message', 'Cập nhật trang thông tin thành công!');
        return redirect::to('/all-info-post');
    }   
    
    public function delete_info_post($info_post_id){
        $this->AuthLogin();
        DB::table('tbl_info_post')->where('info_post_id',$info_post_id)->delete();
        Session::put('message', 'Xóa trang thông tin thành công!');
        return Redirect::to('/all-info-post');
    }
}
