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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Posts
Route::get('/posts', [PostController::class, 'getAllPost'])->name('posts.getAllPost');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/save', [PostController::class, 'save']);

Route::get('/posts/{post:slug}', [PostController::class, 'getPost'])->name('posts.getPost');

Route::get('/posts/{post:slug}/delete', [PostController::class, 'delete']);

Route::get('/posts/edit/{post:slug}', [PostController::class, 'edit']);
Route::patch('/posts/update/{post:slug}', [PostController::class, 'update']);

// Filter
Route::get('/posts/category/{category:name}', [CategoryController::class, 'filterByCategory'])->name('posts.filterByCategory');
Route::get('/posts/tag/{tag:name}', [TagController::class, 'filterByTag'])->name('posts.filterByTag');
