<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class HomeController extends Controller
{
    public function index(){
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

        $all_link = DB::table('tbl_supportlink')->get();
 
         $manager_post = view('pages.home')
             ->with('posts_by_category', $posts_by_category)
             ->with('cate_post', $cate_post)
             ->with('all_link',$all_link)
             ->with('latest_post', $latest_post);
 
         return view('layout')->with('pages.home', $manager_post);
    }
}
