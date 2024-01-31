<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $videos = Video::with('users')->get();
    return view('index', ['videos' => $videos]);
});

Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signup', [UserController::class, 'signup_valid'])->name('signup_valid');
Route::get('/logout', [UserController::class, 'logout'])->name('exit');
Route::get('/signin', [UserController::class, 'signin'])->name('signin');
Route::post('/signin', [UserController::class, 'signin_valid'])->name('signin_valid');

Route::get('/profile', [VideoController::class, 'profile'])->name('profile');
Route::get('/profile/addVideo', [VideoController::class, 'addVideo'])->name('addVideo');
Route::post('/profile/createVideo', [VideoController::class, 'createVideo'])->name('createVideo');

Route::get('/video/{id}', [VideoController::class, 'VideoPage'])->name('video');
Route::post('/video/{video}/comment', [VideoController::class, 'Comment']);

Route::get('/video/{video}/like', [VideoController::class, 'like']);
Route::get('/video/{video/disslike', [VideoController::class, 'disslike']);
