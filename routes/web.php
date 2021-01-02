<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// CRUD Posts
Route::get('/posts', [PostController::class, 'getAllPost'])->name('posts.getAllPost');
Route::middleware('auth')->group(function() {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/save', [PostController::class, 'store']);
    Route::get('/posts/edit/{post:slug}', [PostController::class, 'edit']);
    Route::patch('/posts/update/{post:slug}', [PostController::class, 'update']);
    Route::get('/posts/{post:slug}/delete', [PostController::class, 'delete']);
});
Route::get('/posts/{post:slug}', [PostController::class, 'getPost'])->name('posts.getPost');


// Filter Post
Route::get('/posts/category/{category:name}', [CategoryController::class, 'filterByCategory'])->name('posts.filterByCategory');
Route::get('/posts/tag/{tag:name}', [TagController::class, 'filterByTag'])->name('posts.filterByTag');
