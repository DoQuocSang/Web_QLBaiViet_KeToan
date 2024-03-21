<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryPost extends Controller
{
    public function add_category_post(){
        return view('admin.category_post.add_category_post');
    }

    public function all_category_post(){
        $all_category_post = DB::table('tbl_category_post')->orderby('id','desc')->get();
        $manager_category_post = view('admin.category_post.all_category_post')->with('all_category_post', $all_category_post);
        
        return view('admin_layout')->with('admin.category_post.all_category_post', $manager_category_post);
    }

    public function save_category_post(Request $request){
        $data = array();
        $data['category_name'] = $request->category_post_name;
        $data['category_desc'] = $request->category_post_desc;
        $data['category_status'] = $request->category_post_status;
        $data['created_at'] = date("Y-m-d H:i:s", strtotime($request->category_post_date_create));

        DB::table('tbl_category_post')->insert($data);

        Session::put('message', 'Thêm thể loại bài viết thành công!');
        return Redirect::to('/add-category-post');
    }

    public function active_category_post($id){
        DB::table('tbl_category_post')->where('id',$id)->update(['category_status'=>1]);
        Session::put('message', 'Kích hoạt thể loại bài viết thành công!');
        return Redirect::to('/all-category-post');
    }

    public function unactive_category_post($id){
        DB::table('tbl_category_post')->where('id',$id)->update(['category_status'=>0]);
        Session::put('message', 'Bỏ kích hoạt thể loại bài viết thành công!');
        return Redirect::to('/all-category-post');
    }

    public function edit_category_post($id){
        $edit_category_post = DB::table('tbl_category_post')->where('id',$id)->get();
        $manager_category_post = view('admin.category_post.edit_category_post')->with('edit_category_post', $edit_category_post);
        // echo '<pre>';
        // print_r( $edit_category_post);
        // echo '</pre>';
        return view('admin_layout')->with('admin.category_post.edit_category_post', $manager_category_post);
    }

    public function update_category_post(request $request, $id){
        $data = array();
        $data['category_name'] = $request->category_post_name;
        $data['category_desc'] = $request->category_post_desc;
        DB::table('tbl_category_post')->where('id',$id)->update($data);
        session::put('message', 'Cập nhật thể loại bài viết thành công!');
        return redirect::to('/all-category-post');
    }   
    
    public function delete_category_post($id){
        DB::table('tbl_category_post')->where('id',$id)->delete();
        Session::put('message', 'Xóa thể loại bài viết thành công!');
        return Redirect::to('/all-category-post');
    }

}
