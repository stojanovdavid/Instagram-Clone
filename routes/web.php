<?php

use App\Http\Controllers\RegisterController;
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


Route::get('/iGram/signup', [RegisterController::class, 'index'])->name('iGram.signup');
Route::post('/iGram/signup', [RegisterController::class, 'store'])->name('iGram.signup');


Route::get('/iGram/feed', function(){
    return view('iGram.feed');
})->name('feed');