<?php

use App\Http\Controllers\CategoryPost;
use App\Http\Controllers\InfoPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

//Frontend -----------------------------------------------------------------
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

//Post
Route::get('/all-post', [PostController::class, 'show_post_home']);


//Backend -----------------------------------------------------------------
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/admin-logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Category
Route::get('/all-category-post', [CategoryPost::class, 'all_category_post']);
Route::get('/add-category-post', [CategoryPost::class, 'add_category_post']);
Route::get('/edit-category-post/{category_id}', [CategoryPost::class, 'edit_category_post']);
Route::get('/delete-category-post/{category_id}', [CategoryPost::class, 'delete_category_post']);

Route::get('/active-category-post/{category_id}', [CategoryPost::class, 'active_category_post']);
Route::get('/unactive-category-post/{category_id}', [CategoryPost::class, 'unactive_category_post']);

Route::post('/save-category-post', [CategoryPost::class, 'save_category_post']);
Route::post('/update-category-post/{category_id}', [CategoryPost::class, 'update_category_post']);

//Post
Route::get('/all-post-detail', [PostController::class, 'all_post']);
Route::get('/add-post-detail', [PostController::class, 'add_post']);
Route::get('/edit-post-detail/{post_id}', [PostController::class, 'edit_post']);
Route::get('/delete-post-detail/{post_id}', [PostController::class, 'delete_post']);

Route::get('/active-post-detail/{post_id}', [PostController::class, 'active_post']);
Route::get('/unactive-post-detail/{post_id}', [PostController::class, 'unactive_post']);

Route::post('/save-post-detail', [PostController::class, 'save_post']);
Route::post('/update-post-detail/{post_id}', [PostController::class, 'update_post']);

//Info Post
Route::get('/all-info-post', [InfoPostController::class, 'all_info_post']);
Route::get('/add-info-post', [InfoPostController::class, 'add_info_post']);
Route::get('/edit-info-post/{info_post_id}', [InfoPostController::class, 'edit_info_post']);
Route::get('/delete-info-post/{info_post_id}', [InfoPostController::class, 'delete_info_post']);

Route::get('/active-info-post/{info_post_id}', [InfoPostController::class, 'active_info_post']);
Route::get('/unactive-info-post/{info_post_id}', [InfoPostController::class, 'unactive_info_post']);

Route::post('/save-info-post', [InfoPostController::class, 'save_info_post']);
Route::post('/update-info-post/{info_post_id}', [InfoPostController::class, 'update_info_post']);



