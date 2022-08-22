<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route:: name('home')->get('/', function () {
    return view('templatesSystem.index');
});


// Users routes
Route::name('create-user')->get('/create-user', function () {
    $message = '';
    return view('templatesUser.createUser')->with('message', $message);
});

Route::post('save-user', [UserController::class, 'createUser'])->name('save-user');

Route::name('login-page')->get('/login-page', function () {
    $message = '';
    return view('templatesUser.loginUser')->with('message', $message);
});

Route::post('login-user', [UserController::class, 'loginUser'])->name('login-user');

Route::get('logout-user', [UserController::class, 'logoutUser'])->name('logout-user');

// Posts routes
Route::name('create-post')->get('/create-post', function () {
    return view('templatesPost.createPost')->with('message', $message='');
});
