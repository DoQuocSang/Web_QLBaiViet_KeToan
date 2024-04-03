<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportLink;
use DB;

class HomeController extends Controller
{
    public function index(){
        //return view('pages.home');
        $links =  DB::table('tbl_supportlink')->get();
        return view('pages.home', ['links' => $links]);
    }

}
