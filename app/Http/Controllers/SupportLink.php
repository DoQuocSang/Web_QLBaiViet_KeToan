<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;

class SupportLink extends Controller
{
    public function all_link(){
        //return view('admin.all_link');
        $all_link = DB::table('tbl_supportlink')->get();
        $manager_link=view('admin.all_link')->with('all_link',$all_link);
        return view('admin_layout')->with('admin.all',$manager_link);
    } 

    public function add_link(){
        return view('admin.add_link');
    }

    public function edit_link($link_id){
        $edit_link = DB::table('tbl_supportlink')->where('link_id',$link_id)->first();
        if ($edit_link->title === 'Facebook*' || $edit_link->title === 'Gọi hỗ trợ*' || $edit_link->title === 'Youtube*' || $edit_link->title === 'Zoom*') {
            //Session::put('message','Bạn không thể xóa liên kết cố định!');
            Session::flash('error', 'Bạn không thể sửa liên kết cố định!');
            return redirect()->back();
            
        }
        $manager_link=view('admin.edit_link')->with('edit_link',$edit_link);
        return view('admin_layout')->with('admin.edit_link',$manager_link);
    }
    public function save_link(Request $request){
        $data=array();
        $data['title'] = $request->title;  
        $data['url'] = $request->url;          

         DB::table('tbl_supportlink')->insert($data);
         //Session::put('message','Thêm đường dẫn thành công!');
         Session::flash('success', 'Thêm liên kết thành công!');
         return Redirect::to ('all-link');
    }
    public function update_link(Request $request,$link_id){
        $data=array();
        $data['title'] = $request->title;  
        $data['url'] = $request->url;          
        
        DB::table('tbl_supportlink')->where('link_id',$link_id)->update($data);
        Session::flash('success', 'Cập nhật liên kết thành công!');
        return Redirect::to ('all-link');
    }
    public function delete_link(Request $request,$link_id){
       
        $link = DB::table('tbl_supportlink')->where('link_id', $link_id)->first();
        if ($link->title === 'Facebook*' || $link->title === 'Gọi hỗ trợ*' || $link->title === 'Youtube*' || $link->title === 'Zoom*') {
            //Session::put('message','Bạn không thể xóa liên kết cố định!');
            Session::flash('error', 'Bạn không thể xóa liên kết cố định!');
            return redirect()->back();
            
        }
  
        DB::table('tbl_supportlink')->where('link_id',$link_id)->delete();
        Session::flash('success', 'Xóa liên kết thành công!');
        return Redirect::to ('all-link');
    }
}