<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/trang-chu', [HomeController::class, 'index']);
