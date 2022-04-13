<?php

use Illuminate\Support\Facades\Route;


use \App\Http\Controllers\PostController;

use \App\Http\Controllers\CommentController;



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



Route::get('/posts',[PostController::class,'index'])->name('posts.index');

Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');

Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');

Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

// =================    Comments============

Route::get('/comments',[CommentController::class,'index'])->name('comments.index');

Route::get('/comments/create',[CommentController::class,'create'])->name('comments.create');

Route::post('/comments/{post_id}',[CommentController::class,'store'])->name('comments.store');

Route::get('/comments/{comment}',[CommentController::class,'show'])->name('comments.show');

Route::put('/comments/{comment}',[CommentController::class],'update')->name('comments.update');

Route::put('/comments/{comment}/edit',[CommentController::class],'edit')->name('comments.edit');

Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');






//============================== to Connect all Data ==================
//to make a table of posts-
//1- define a new route for the user in order to hit the url in browser
//2- define  a new controller
//3- define a new view
//4- define $posts array and pass it to the view

// ==========================================================================

//Error in This command

//Route::get('/hello2','HelloController@helloAction');
