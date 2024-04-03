<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupportLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;


//Backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/admin-logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

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

//Frontend
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

// Route cho trang đăng nhập
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/loginSubmit', [AuthController::class, 'login'])->name('login.submit');


