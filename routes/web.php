<?php

use App\Http\Controllers\LoginController;
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
});





Route::prefix('/iGram')->group(function(){
    Route::get('/signup', [RegisterController::class, 'index'])->name('iGram.signup');
    Route::post('/signup', [RegisterController::class, 'store']);
    Route::post('/login', [LoginController::class, 'store'])->name('iGram.login');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::get('/feed', function(){
        return view('iGram.feed');
    })->name('feed');
    Route::get('/myProfile', [ProfileController::class, 'index'])->name('myProfile');
    Route::get('/user', [UserController::class, 'search'])->name('user');
});

Route::post('/follow/{followerId}/{followedId}/{val}', [ProfileController::class, 'followProfile'])->name('follow.user');