<?php

use Illuminate\Support\Facades\Route;


use \App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\CommentController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


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


// ========================GITHUB==========================
    Route::get('/github/auth/redirect',[GithubController::class,'redirectToGithub'])->name('loginWithGithub');

    Route::get('/github/auth/callback',[GithubController::class,'handleGithubCallback']);

// ==========================Google=========================

Route::get('/auth/google/redirect',[GoogleController::class,'redirectToGoogle'])->name('loginWithGoogle');

Route::get('/google/auth/callback',[GoogleController::class,'handleGoogleCallback']);

// =========================== POSTS ===========================

Route::get('/posts',[PostController::class,'index'])->name('posts.index');

Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::put('/posts/{postId}',[PostController::class,'update'])->name('posts.update');

Route::delete('/posts/{postId}',[PostController::class,'destroy'])->name('posts.destroy');

Route::get('/posts/{postId}/edit',[PostController::class,'edit'])->name('posts.edit');

Route::get('/posts/{postId}',[PostController::class,'show'])->name('posts.show');

// =================    Comments============

Route::get('/comments',[CommentController::class,'index'])->name('comments.index');

Route::get('/comments/create',[CommentController::class,'create'])->name('comments.create');

Route::post('/comments/{post_id}',[CommentController::class,'store'])->name('comments.store');

Route::put('/comments/{comment}',[CommentController::class,'update'])->name('comments.update');

Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');

Route::get('/comments/{comment}/edit',[CommentController::class,'edit'])->name('comments.edit');

Route::get('/comments/{comment}',[CommentController::class,'show'])->name('comments.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ===================== Livewire Routes ============================

Route::get('/livewire/posts',Posts::class);


//============================== to Connect all Data ==================
//to make a table of posts-
//1- define a new route for the user in order to hit the url in browser
//2- define  a new controller
//3- define a new view
//4- define $posts array and pass it to the view

// ==========================================================================

//Error in This command

//Route::get('/hello2','HelloController@helloAction');
