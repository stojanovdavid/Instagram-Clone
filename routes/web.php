<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MessageController;
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
    Route::get('/feed', function(){
        return view('iGram.feed');
    })->name('feed');
    Route::get('/myProfile', [ProfileController::class, 'index'])->name('myProfile');
    Route::get('/user', [UserController::class, 'search'])->name('user');
});

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::post('/follow/{followerId}/{followedId}/{val}', [ProfileController::class, 'followProfile'])->name('follow.user');
Route::get('/iGram/edit/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/iGram/edit/profile/{id}', [ProfileController::class, 'update']);


Route::get('iGram/messages', [MessageController::class, 'index'])->name('messages');
Route::post('iGram/chat/message/send/{authId}/{recieverId}/{message}', [MessageController::class, 'sendMessage']);
Route::post('iGram/message/send/{authId}/{recieverId}/{message}', [MessageController::class, 'sendMessage']);
Route::get('iGram/chat/{id}', [MessageController::class, 'seeChat'])->name('userChat');