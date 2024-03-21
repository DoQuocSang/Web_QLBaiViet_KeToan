<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
{
    public function add_post(){
        $cate_post = DB::table('tbl_category_post')->orderby('category_id','desc')->get();
        return view('admin.post.add_post')->with('cate_post',$cate_post);
    }

    public function all_post(){
        $all_post = DB::table('tbl_post')
        ->join('tbl_category_post','tbl_category_post.category_id','=','tbl_post.category_id')
        ->orderby('tbl_post.post_id','desc')->get();
        $manager_post = view('admin.post.all_post')->with('all_post', $all_post);
        
        return view('admin_layout')->with('admin.post.all_post', $manager_post);
    }

    public function save_post(Request $request){
        $data = array();
        $data['post_index'] = $request->post_index;
        $data['category_id'] = $request->category_id;
        $data['post_title'] = $request->post_title;
        $data['post_content'] = $request->post_content;
        $data['post_status'] = $request->post_status;
        $data['post_author'] = Session::get('admin_name');
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_post')->insert($data);

        Session::put('message', 'Thêm bài viết thành công!');
        return Redirect::to('/add-post-detail');
    }

    public function active_post($post_id){
        DB::table('tbl_post')->where('post_id',$post_id)->update(['post_status'=>1]);
        Session::put('message', 'Kích hoạt bài viết thành công!');
        return Redirect::to('/all-post-detail');
    }

    public function unactive_post($post_id){
        DB::table('tbl_post')->where('post_id',$post_id)->update(['post_status'=>0]);
        Session::put('message', 'Bỏ kích hoạt bài viết thành công!');
        return Redirect::to('/all-post-detail');
    }

    public function edit_post($post_id){
        $cate_post = DB::table('tbl_category_post')->orderby('category_id','desc')->get();
        $edit_post = DB::table('tbl_post')->where('post_id',$post_id)->get();
        $manager_post = view('admin.post.edit_post')
        ->with('edit_post', $edit_post)
        ->with('cate_post', $cate_post);
        return view('admin_layout')->with('admin.post.edit_post', $manager_post);
    }

    public function update_post(request $request, $post_id){
        $data = array();
        $data['post_index'] = $request->post_index;
        $data['category_id'] = $request->category_id;
        $data['post_title'] = $request->post_title;
        $data['post_content'] = $request->post_content;
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_post')->where('post_id',$post_id)->update($data);
        session::put('message', 'Cập nhật bài viết thành công!');
        return redirect::to('/all-post-detail');
    }   
    
    public function delete_post($post_id){
        DB::table('tbl_post')->where('post_id',$post_id)->delete();
        Session::put('message', 'Xóa bài viết thành công!');
        return Redirect::to('/all-post-detail');
    }

}
