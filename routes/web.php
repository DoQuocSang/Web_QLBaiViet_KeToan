<?php

use App\Http\Controllers\CategoryPost;
use App\Http\Controllers\InfoPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupportLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;

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

// Route cho trang đăng nhập
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/loginSubmit', [AuthController::class, 'login'])->name('login.submit');
//Route::post('/loginSubmit', [UserController::class, 'login'])->name('login.submit');

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
//-----------------
Route::get('/post-detail-by-id/{post_id}', [PostController::class, 'post_detail_by_id']);

//User
Route::get('/all-user', [UserController::class, 'all_user']);
Route::get('/add-user', [UserController::class, 'add_user']);
//Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/edit-user/{user_id}', [UserController::class, 'edit_user']);
Route::delete('/delete-user/{user_id}', [UserController::class, 'delete_user'])->name('delete.user');

Route::post('/save-user', [UserController::class, 'save_user']);
Route::post('/update-user/{user_id}', [UserController::class, 'update_user']);

//Link
Route::get('/all-link', [SupportLinkController::class, 'all_link']);
Route::get('/add-link', [SupportLinkController::class, 'add_link']);
Route::get('/edit-link/{id}', [SupportLinkController::class, 'edit_link']);
Route::delete('/delete-link/{id}', [SupportLinkController::class, 'delete_link'])->name('delete.link');

Route::post('/save-link', [SupportLinkController::class, 'save_link']);
Route::post('/update-link/{id}', [SupportLinkController::class, 'update_link']);

//Menu
Route::get('/all-menu', [MenuController::class, 'all_menu']);
Route::get('/active-menu-detail/{id}', [MenuController::class, 'active_menu']);
Route::get('/unactive-menu-detail/{id}', [MenuController::class, 'unactive_menu']);
Route::get('/edit-menu-detail/{id}', [MenuController::class, 'edit_menu']);
Route::post('/update-menu-detail/{id}', [MenuController::class, 'update_menu']);
Route::get('/add-menu', [MenuController::class, 'add_menu']);
Route::post('/save-menu', [MenuController::class, 'save_menu']);
Route::get('/delete-menu-detail/{id}', [MenuController::class, 'delete_menu']);

Route::get('/active-sub-menu-detail/{id}', [MenuController::class, 'active_sub_menu']);
Route::get('/unactive-sub-menu-detail/{id}', [MenuController::class, 'unactive_sub_menu']);
Route::get('/edit-sub-menu-detail/{id}', [MenuController::class, 'edit_sub_menu']);
Route::post('/update-sub-menu-detail/{id}', [MenuController::class, 'update_sub_menu']);
Route::get('/add-sub-menu', [MenuController::class, 'add_sub_menu']);
Route::post('/save-sub-menu', [MenuController::class, 'save_sub_menu']);
Route::get('/delete-menu-sub-detail/{id}', [MenuController::class, 'delete_sub_menu']);

//Info Post
Route::get('/all-info-post', [InfoPostController::class, 'all_info_post']);
Route::get('/add-info-post', [InfoPostController::class, 'add_info_post']);
Route::get('/edit-info-post/{info_post_id}', [InfoPostController::class, 'edit_info_post']);
Route::get('/delete-info-post/{info_post_id}', [InfoPostController::class, 'delete_info_post']);

Route::get('/active-info-post/{info_post_id}', [InfoPostController::class, 'active_info_post']);
Route::get('/unactive-info-post/{info_post_id}', [InfoPostController::class, 'unactive_info_post']);

Route::post('/save-info-post', [InfoPostController::class, 'save_info_post']);

Route::post('/update-info-post/{info_post_id}', [InfoPostController::class, 'update_info_post']);