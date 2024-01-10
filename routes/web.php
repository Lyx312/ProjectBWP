<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureUserIsCustomer;
use App\Http\Middleware\EnsureUserIsSeller;
use App\Http\Middleware\EnsureUserNotLoggedIn;
use App\Http\Middleware\EnsureUserIsLoggedIn;
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
    return view('Login');
});
Route::controller(UserController::class)->group(function () {
    //Route::middleware('guest')->group(function () {
        Route::get('/admin', 'getAdminPage')->name('admin-page')->middleware([EnsureUserIsAdmin::class]);
        Route::get('/admin', 'index')->name('admin-page')->middleware([EnsureUserIsAdmin::class]);
        Route::post('/admin/ban/{username}', 'banUser')->name('ban-user')->middleware([EnsureUserIsAdmin::class]);
        Route::get('/admin/ban/{username}', 'banUser')->name('ban-user-get')->middleware([EnsureUserIsAdmin::class]);
        Route::get('/customer', 'getCustomerPage')->name('customer-page');
        Route::get('/seller', 'getSellerPage')->name('seller-page')->middleware([EnsureUserIsSeller::class]);
        Route::get('/account', 'getAccountPage')->name('account-page')->middleware([EnsureUserIsLoggedIn::class]);

        Route::get('/login', 'getLoginPage')->name('login-page');
        Route::get('/register', 'getRegisterPage')->name('register-page');
        Route::get('/shop', 'getShopPage')->name('Shop-page');
        Route::get('/cart', 'getCartPage')->name('Cart-page')->middleware([EnsureUserIsCustomer::class]);
        Route::get('/login', 'getLoginPage')->name('login-page')->middleware([EnsureUserNotLoggedIn::class]);
        Route::get('/register', 'getRegisterPage')->name('register-page')->middleware([EnsureUserNotLoggedIn::class]);

        Route::get('/detail/{itemID}', 'getDetailPage')->name('detail-page');
        Route::post('/detail/{itemID}', 'addToCartProcess')->name('add-to-cart')->middleware([EnsureUserIsCustomer::class]);

        Route::post('/addItem', 'addItemProcess')->name('add-item-process')->middleware([EnsureUserIsSeller::class]);;

        Route::post('/login', 'loginProcess')->name('login-process');
        Route::post('/register', 'registerProcess')->name('register-process');

        Route::get('/logout', 'logoutProcess')->name('logout-process');

        Route::get('/test', 'test')->name('test-page');
    //});
});


