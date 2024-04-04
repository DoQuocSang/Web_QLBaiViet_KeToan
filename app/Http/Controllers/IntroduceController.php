<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
// session_start();

class IntroduceController extends Controller
{
    public function get_post_introduce() {
        $post_introduce = DB::table('tbl_info_post')
                ->where('info_post_title', 'CÔNG TY TNHH NC9 VIỆT NAM')
                ->first();
        $manager_post_introduce = view('pages.introduce')->with('post_introduce', $post_introduce);
    
        if ($post_introduce) {
            return view('layout')->with('pages.introduce', $manager_post_introduce);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy bài viết có tiêu đề là "CÔNG TY TNHH NC9 VIỆT NAM"'
            ], 404);
        }
    }

    public function get_post_instruct() {
        $post_instruct = DB::table('tbl_info_post')
                ->where('info_post_title', 'HƯỚNG DẪN SỬ DỤNG')
                ->first();
        $manager_post_instruct = view('pages.instruct')->with('post_instruct', $post_instruct);
    
        if ($post_instruct) {
            return view('layout')->with('pages.instruct', $manager_post_instruct);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy bài viết có tiêu đề là "HƯỚNG DẪN SỬ DỤNG"'
            ], 404);
        }
    }
}
