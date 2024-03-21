<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportLink extends Controller
{
    public function all_link(){
        return view('admin.all_link');
        
    } 

    public function add_link(){
        return view('admin.add_link');
    }
    public function edit_link($link_id){
    }
    public function save_link(Request $request){
      
    }
    public function update_link(Request $request,$link_id){
        
    }
    public function delete_link(Request $request,$link_id){
      
    }
}
