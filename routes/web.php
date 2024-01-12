<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SellerController;
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

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'getKatalogPage')->name('customer-page');
    Route::get('/admin', 'getAdminPage')->name('admin-page')->middleware([EnsureUserIsAdmin::class]);
    Route::get('/seller', 'getSellerPage')->name('seller-page')->middleware([EnsureUserIsSeller::class]);
    Route::get('/account', 'getAccountPage')->name('account-page')->middleware([EnsureUserIsLoggedIn::class]);

    Route::get('/detail/{itemID}', 'getDetailPage')->name('detail-page');
    Route::get('/shop/{categoryID}', 'getCategoryPage')->name('category-page');

    Route::get('/shop', 'getShopPage')->name('Shop-page');
    Route::get('/login', 'getLoginPage')->name('login-page')->middleware([EnsureUserNotLoggedIn::class]);
    Route::get('/register', 'getRegisterPage')->name('register-page')->middleware([EnsureUserNotLoggedIn::class]);


    Route::get('/test', 'test')->name('test-page');
});

Route::get('/search', [AjaxController::class, 'search']);
Route::post('/searhItem,', [AjaxController::class, 'searchItem'])->name('postSubmit');


Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'loginProcess')->name('login-process');
    Route::post('/register', 'registerProcess')->name('register-process');

    Route::post('/account/edit', 'editProfileProcess')->name('edit-profile-process');
    Route::post('/account/password', 'changePasswordProcess')->name('change-password-process');

    Route::post('/review', 'postReviewProcess')->name('post-review-process');

    Route::get('/logout', 'logoutProcess')->name('logout-process');
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/topup', 'getTopUpPage')->name('Topup-page')->middleware([EnsureUserIsCustomer::class]);
    Route::post('/top-up', 'topUpProcess')->name('top-up-process')->middleware([EnsureUserIsCustomer::class]);
    Route::get('/cart', 'getCartPage')->name('Cart-page')->middleware([EnsureUserIsCustomer::class]);
    Route::post('/add-to-cart/{itemID}', 'addToCartProcess')->name('add-to-cart')->middleware([EnsureUserIsCustomer::class]);
    //Route::post('/detail/{itemID}', 'addToCartProcess')->name('detail-add-to-cart')->middleware([EnsureUserIsCustomer::class]);
    Route::post('/cart/master/{cartId}', 'masterCart')->name('cart-master')->middleware([EnsureUserIsCustomer::class]);
    Route::get('/cart/checkout', 'doCheckout')->name('doCheckout')->middleware([EnsureUserIsCustomer::class]);
    Route::get('/orderList', 'getOrderListPage')->name('orders-page')->middleware([EnsureUserIsCustomer::class]);
});

Route::controller(SellerController::class)->group(function () {
    Route::post('/masterItem', 'masterItemProcess')->name('master-item-process')->middleware([EnsureUserIsSeller::class]);
    Route::get('/delete/{itemID}', 'deleteItemProcess')->name('delete-item-process')->middleware([EnsureUserIsSeller::class]);
    Route::get('/restore/{itemID}', 'restoreItemProcess')->name('restore-item-process')->middleware([EnsureUserIsSeller::class]);

    Route::post('/masterDiscount', 'masterDiscountProcess')->name('master-discount-process')->middleware([EnsureUserIsSeller::class]);
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/ban/{username}', 'banUser')->name('ban-user-get')->middleware([EnsureUserIsAdmin::class]);
    Route::post('/admin/ban/{username}', 'banUser')->name('ban-user')->middleware([EnsureUserIsAdmin::class]);
    Route::get('/admin/reports', 'getReportPage')->name('report-page')->middleware([EnsureUserIsAdmin::class]);
    Route::post('/admin', 'filter')->name('filter-user')->middleware([EnsureUserIsAdmin::class]);
    Route::get('/admin/userDetail/{username}', 'getUserPage')->name('userDetail-page')->middleware([EnsureUserIsAdmin::class]);
});
