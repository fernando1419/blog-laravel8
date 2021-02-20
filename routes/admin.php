<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.users.index')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users'); // CRUD for roles y permissions to users.

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');
