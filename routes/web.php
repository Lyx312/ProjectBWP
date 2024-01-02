<?php

use App\Http\Controllers\UserController;
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

// halaman pertama masuk di FrontPage untuk login register
Route::get('/', function () {
    return view('layout.FrontPage');
});
Route::controller(UserController::class)->group(function () {
    //Route::middleware('guest')->group(function () {
        Route::get('/login', 'getLoginPage')->name('login-page');
        Route::get('/register', 'getRegisterPage')->name('register-page');

        Route::post('/login', 'loginProcess')->name('login-process');
        Route::post('/register', 'registerProcess')->name('register-process');
    //});
});


