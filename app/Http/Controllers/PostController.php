<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;


class PostController extends Controller
{
    //admin page controller
    public function AuthLogin()
    {
        $admin_id = session::get('admin_id');
        if ($admin_id) {
            return redirect::to('/dashboard');
        } else {
            return redirect::to('/admin')->send();
        }
    }

    public function add_post()
    {
        $this->AuthLogin();
        $cate_post = DB::table('tbl_category_post')->orderby('category_id', 'desc')->get();
        return view('admin.post.add_post')->with('cate_post', $cate_post);
    }

    public function all_post()
    {
        $this->AuthLogin();
        $all_post = DB::table('tbl_post')
            ->join('tbl_category_post', 'tbl_category_post.category_id', '=', 'tbl_post.category_id')
            ->orderby('tbl_post.post_index', 'asc')->get();
        $manager_post = view('admin.post.all_post')->with('all_post', $all_post);

        return view('admin_layout')->with('admin.post.all_post', $manager_post);
    }

    public function save_post(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['post_index'] = $request->post_index;
        $data['category_id'] = $request->category_id;
        $data['post_title'] = $request->post_title;
        $data['post_content'] = $request->post_content;
        $data['post_status'] = $request->post_status;
        $data['post_author'] = Session::get('admin_name');
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        // echo '<pre>';
        // print_r($data) ;
        // echo '</pre>';
        // echo $data['post_demo'];
        DB::table('tbl_post')->insert($data);

        Session::put('message', 'Thêm bài viết thành công!');
        return Redirect::to('/add-post-detail');
    }

    public function active_post($post_id)
    {
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $post_id)->update(['post_status' => 1]);
        Session::put('message', 'Kích hoạt bài viết thành công!');
        return Redirect::to('/all-post-detail');
    }

    public function unactive_post($post_id)
    {
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $post_id)->update(['post_status' => 0]);
        Session::put('message', 'Bỏ kích hoạt bài viết thành công!');
        return Redirect::to('/all-post-detail');
    }

    public function edit_post($post_id)
    {
        $this->AuthLogin();
        $cate_post = DB::table('tbl_category_post')->orderby('category_id', 'desc')->get();
        $edit_post = DB::table('tbl_post')->where('post_id', $post_id)->get();
        $manager_post = view('admin.post.edit_post')
            ->with('edit_post', $edit_post)
            ->with('cate_post', $cate_post);
        return view('admin_layout')->with('admin.post.edit_post', $manager_post);
    }

    public function update_post(request $request, $post_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['post_index'] = $request->post_index;
        $data['category_id'] = $request->category_id;
        $data['post_title'] = $request->post_title;
        $data['post_content'] = $request->post_content;
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_post')->where('post_id', $post_id)->update($data);
        session::put('message', 'Cập nhật bài viết thành công!');
        return redirect::to('/all-post-detail');
    }

    public function delete_post($post_id)
    {
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $post_id)->delete();
        Session::put('message', 'Xóa bài viết thành công!');
        return Redirect::to('/all-post-detail');
    }

    //end admin page controller

    //------------------------------------------------------------------------------------------------

    //home cotroller
    public function show_post_home()
    {
        // Lấy danh sách các chủ đề bài viết
        $cate_post = DB::table('tbl_category_post')->where('category_status', '1')->orderBy('category_id', 'desc')->get();

        // Khởi tạo mảng chứa thông tin các bài viết theo từng chủ đề
        $posts_by_category = [];

        // Lặp qua từng chủ đề
        foreach ($cate_post as $category) {
            // Lấy danh sách các bài viết thuộc chủ đề hiện tại
            $posts = DB::table('tbl_post')
                ->join('tbl_category_post', 'tbl_category_post.category_id', '=', 'tbl_post.category_id')
                ->where('tbl_post.category_id', $category->category_id)
                ->orderBy('tbl_post.post_index', 'asc')
                ->get();

            // Thêm danh sách bài viết vào mảng $posts_by_category với key là id của chủ đề
            $posts_by_category[$category->category_id] = $posts;
        }

        $latest_post = DB::table('tbl_post')
        ->join('tbl_category_post', 'tbl_category_post.category_id', '=', 'tbl_post.category_id')
        ->orderBy('tbl_post.post_id', 'desc')
        ->get();

        $manager_post = view('pages.post.all_post')
            ->with('posts_by_category', $posts_by_category)
            ->with('cate_post', $cate_post)
            ->with('latest_post', $latest_post);

        return view('layout')->with('pages.post.all_post', $manager_post);
    }

    public function post_detail_by_id($post_id)
    {
        $post_by_id =  DB::table('tbl_post')
            ->join('tbl_category_post', 'tbl_category_post.category_id', '=', 'tbl_post.category_id')
            ->where('tbl_post.post_id',$post_id)
            ->get();

        $latest_post = DB::table('tbl_post')
        ->join('tbl_category_post', 'tbl_category_post.category_id', '=', 'tbl_post.category_id')
        ->orderBy('tbl_post.post_id', 'desc')
        ->get();

        $manager_post = view('pages.post.post_detail')
            ->with('post_by_id', $post_by_id)
            ->with('latest_post', $latest_post);

        return view('layout')->with('pages.post.post_detail', $manager_post);
    }


    //end home cotroller
}
