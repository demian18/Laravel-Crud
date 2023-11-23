<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
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
    $posts = \App\Models\Post::with('category', 'comment')->take(3)->latest()->get();
    return view('pages.home', compact('posts'));
});
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::post('comment', [CommentController::class, 'store'])->name('comment.store');

Route::group(['middleware'=>'auth', 'prefix'=>'admin', 'as'=>'admin.'], function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts', PostController::class);
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('posts');
