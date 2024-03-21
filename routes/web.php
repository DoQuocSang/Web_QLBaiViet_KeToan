<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User;
use App\Http\Controllers\SupportLink;

//Frontend
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

//Backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/admin-logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//User
Route::get('/all-user', [User::class, 'all_user']);
Route::get('/add-user', [User::class, 'add_user']);
Route::get('/edit-user/{id}', [User::class, 'edit_user']);
Route::get('/delete-user/{id}', [User::class, 'delete_user']);

Route::post('/save-user', [User::class, 'save_user']);
Route::post('/update-user/{id}', [User::class, 'update_user']);

//Link
Route::get('/all-link', [SupportLink::class, 'all_link']);
Route::get('/add-link', [SupportLink::class, 'add_link']);
Route::get('/edit-link/{id}', [SupportLink::class, 'edit_link']);
Route::get('/delete-link/{id}', [SupportLink::class, 'delete_link']);

Route::post('/save-link', [SupportLink::class, 'save_link']);
Route::post('/update-link/{id}', [SupportLink::class, 'update_link']);


