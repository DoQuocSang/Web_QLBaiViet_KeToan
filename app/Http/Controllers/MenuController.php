<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class MenuController extends Controller
{
    public function all_menu(){
        $menus = DB::table('tbl_menu')->orderBy('id_menu', 'asc')->get();
        $submenus = DB::table('tbl_sub_menu')->orderBy('id_sub_menu', 'asc')->get();
        $all_menus = [];
        foreach ($menus as $menu) {
            $menu->submenus = [];
            foreach ($submenus as $submenu) {
                if ($submenu->id_parent == $menu->id_menu) {
                    $menu->submenus[] = $submenu;
                }
            }
            $all_menus[] = $menu;
        }
        $manager_menu = view('admin.menu.all_menu')->with('all_menus', $all_menus);
        return view('admin_layout')->with('admin.menu.all_menu', $manager_menu);
    }
     
    // menu
    public function add_menu(){
        return view('admin.menu.add_menu');
    }

    public function save_menu(Request $request){
        $data = array();
        $data['menu_name'] = $request->menu_name;
        $data['menu_url'] = $request->menu_url;
        $data['menu_status'] = $request->menu_status;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");

        DB::table('tbl_menu')->insert($data);

        Session::put('message', 'Thêm menu thành công!');
        return Redirect::to('/add-menu');
    }

    public function edit_menu($menu_id){
        $edit_menu = DB::table('tbl_menu')->where('id_menu',$menu_id)->get();
        $manager_menu = view('admin.menu.edit_menu')
        ->with('edit_menu', $edit_menu);
        return view('admin_layout')->with('admin.menu.edit_menu', $manager_menu);
    }

    public function update_menu(request $request, $menu_id){
        $data = array();
        $data['menu_name'] = $request->menu_name;
        $data['menu_url'] = $request->menu_url;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_menu')->where('id_menu',$menu_id)->update($data);
        session::put('message', 'Cập nhật menu thành công!');
        return redirect::to('/all-menu');
    } 

    public function delete_menu($menu_id){
        DB::table('tbl_menu')->where('id_menu', $menu_id)->delete();
        Session::put('message', 'Xóa menu thành công!');
        return Redirect::to('/all-menu');
    }
    //

    // sub menu
    public function add_sub_menu(){
        $menus = DB::table('tbl_menu')->orderBy('id_menu', 'asc')->get();
        $manager_sub_menu = view('admin.menu.add_sub_menu')
                        ->with('menus', $menus);
        return view('admin_layout')->with('admin.menu.add_sub_menu', $manager_sub_menu);
    }

    public function save_sub_menu(Request $request){
        $data = array();
        $data['id_parent'] = $request->id_parent;
        $data['menu_sub_name'] = $request->menu_sub_name;
        $data['menu_sub_url'] = $request->menu_sub_url;
        $data['menu_sub_status'] = $request->menu_sub_status;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");

        DB::table('tbl_sub_menu')->insert($data);

        Session::put('message', 'Thêm menu con thành công!');
        return Redirect::to('/add-sub-menu');
    }

    public function edit_sub_menu($menu_sub_id){
        $edit_sub_menu = DB::table('tbl_sub_menu')->where('id_sub_menu',$menu_sub_id)->get();

        $menus = DB::table('tbl_menu')->orderBy('id_menu', 'asc')->get();
        $manager_sub_menu = view('admin.menu.edit_sub_menu')
                        ->with('edit_sub_menu', $edit_sub_menu)
                        ->with('menus', $menus);
        return view('admin_layout')->with('admin.menu.edit_sub_menu', $manager_sub_menu);
    }

    public function update_sub_menu(request $request, $menu_sub_id){
        $data = array();
        $data['id_parent'] = $request->id_parent;
        $data['menu_sub_name'] = $request->menu_sub_name;
        $data['menu_sub_url'] = $request->menu_sub_url;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('tbl_sub_menu')->where('id_sub_menu',$menu_sub_id)->update($data);
        session::put('message', 'Cập nhật menu thành công!');
        return redirect::to('/all-menu');
    }   
    public function delete_sub_menu($menu_sub_id){
        DB::table('tbl_sub_menu')->where('id_sub_menu', $menu_sub_id)->delete();
        Session::put('message', 'Xóa menu con thành công!');
        return Redirect::to('/all-menu');
    }
    //

    public function active_menu($menu_id){
        DB::table('tbl_menu')->where('id_menu', $menu_id)->update(['menu_status'=>1]);
        Session::put('message', 'Kích hoạt menu thành công!');
        return Redirect::to('/all-menu');
    }

    public function unactive_menu($menu_id){
        DB::table('tbl_menu')->where('id_menu',$menu_id)->update(['menu_status'=>0]);
        Session::put('message', 'Bỏ kích hoạt menu thành công!');
        return Redirect::to('/all-menu');
    }

    public function active_sub_menu($menu_sub_id){
        DB::table('tbl_sub_menu')->where('id_sub_menu', $menu_sub_id)->update(['menu_sub_status'=>1]);
        Session::put('message', 'Kích hoạt menu con thành công!');
        return Redirect::to('/all-menu');
    }

    public function unactive_sub_menu($menu_sub_id){
        DB::table('tbl_sub_menu')->where('id_sub_menu',$menu_sub_id)->update(['menu_sub_status'=>0]);
        Session::put('message', 'Bỏ kích hoạt menu con thành công!');
        return Redirect::to('/all-menu');
    }
}
