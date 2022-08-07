<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
})->name('welcome');





Route::prefix('/iGram')->group(function(){
Route::get('/signup', [RegisterController::class, 'index'])->name('signup');
Route::post('/signup', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'store'])->name('login');
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/feed', [HomeController::class, 'index'])->name('feed')->middleware('auth');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::delete('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');
        Route::get('/user', [UserController::class, 'search'])->name('user');
        Route::get('/user/{id}', [UserController::class, 'view'])->name('user.view');
        Route::post('comment/{authId}/{postId}/{comment}', [CommentController::class, 'store']);
        Route::prefix('/post')->group(function(){
            Route::get('view/{id}', [PostController::class, 'index'])->name('post.view');
            Route::get('create', [PostController::class, 'create'])->name('post.create');
            Route::post('create', [PostController::class, 'store'])->name('post.create');
            Route::post('view/comment/{authId}/{postId}/{comment}', [CommentController::class, 'store']);
            Route::get('like/{id}', [LikeController::class, 'likePost'])->name('post.like');
            Route::get('unlike/{id}', [LikeController::class, 'unlikePost'])->name('post.unlike');
            Route::get('comment/delete/{commentId}', [CommentController::class, 'destroy'])->name('comment.delete');
        });
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/chat/{id}', [MessageController::class, 'seeChat'])->name('userChat');
        Route::get('/edit/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/edit/profile/{id}', [ProfileController::class, 'update']);
        Route::post('/chat/message/send/{authId}/{recieverId}/{message}', [MessageController::class, 'sendMessage']);
        Route::post('/message/send/{authId}/{recieverId}/{message}', [MessageController::class, 'sendMessage']);
    });
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    Route::post('/follow/{followerId}/{followedId}/{val}', [ProfileController::class, 'followProfile'])->name('follow.user');
    Route::post('/unfollow/{unfollowerId}/{unfollowedId}/{val}', [ProfileController::class, 'unfollowProfile'])->name('unfollow.user');


