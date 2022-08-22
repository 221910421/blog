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

Route::get('/', function () {
    return view('templatesSystem.index');
});

Route::name('create-user')->get('/create-user', function () {
    $message = '';
    return view('templatesUser.createUser')->with('message', $message);
});

Route::post('save-user', [UserController::class, 'createUser'])->name('save-user');
