<?php

use App\Http\Controllers\SkeletonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\HomeController;
use App\Http\Controllers\SuperAdmin\MerchantController;
use App\Http\Controllers\SuperAdmin\ProductController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\VoucherController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminVoucherController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Merchant\UserMerchantController;

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

// Authentication Route

Route::get('/register',[RegisterController::class, 'registerForm']);
Route::post('/register',[RegisterController::class, 'doRegister']);
Route::get('/login',[LoginController::class, 'loginForm'])->name('login');
Route::post('/login',[LoginController::class, 'doLogin']);
Route::get('/logout',[LogoutController::class, 'doLogout']);

// End Authentication Route

// Admin Route

Route::group(['middleware' => 'admin', 'prefix' => 'admin'],function(){
    Route::get('/home',[AdminHomeController::class, 'getHome']);
    // Produk
    Route::get('/product',[AdminProductController::class, 'getProduct']);
    Route::post('/product',[AdminProductController::class, 'makeProduct']);
    Route::post('/product/{id}',[AdminProductController::class, 'deleteProduct']);
    // Voucher
    Route::get('/voucher',[AdminProductController::class, 'getVoucher']);
    Route::post('/voucher',[AdminVoucherController::class, 'makeVoucher']);
    Route::post('/voucher/{id}',[AdminProductController::class, 'deleteVoucher']);
});

// End Admin Route


// Super Admin Route

Route::group(['middleware' => 'superadmin','prefix' => 'superadmin'],function(){
    Route::get('/home',[HomeController::class, 'getHome']);
    // Admin
    Route::get('/admin',[AdminController::class, 'getAdmin']);
    Route::post('/admin',[AdminController::class, 'makeAdmin']);
    Route::post('/admin/{id}',[AdminController::class, 'deleteAdmin']);
    // Produk
    Route::get('/product',[ProductController::class, 'getProduct']);
    Route::post('/product',[ProductController::class, 'makeProduct']);
    Route::post('/product/{id}',[ProductController::class, 'deleteProduct']);
    // Voucher
    Route::get('/voucher',[VoucherController::class, 'getVoucher']);
    Route::post('/voucher',[VoucherController::class, 'makeVoucher']);
    Route::post('/voucher/{id}',[VoucherController::class, 'deleteVoucher']);
    // User
    Route::get('/user',[UserController::class, 'getUser']);
    Route::post('/user/{id}',[UserController::class, 'deleteUser']);
    // Merchant
    Route::get('/merchant',[MerchantController::class, 'getMerchant']);
    Route::post('/merchant',[MerchantController::class, 'registerMerchant']);
    Route::post('/merchant/{id}',[MerchantController::class, 'deleteMerchant']);
});

// End Super Admin Route

// Merchant Route

Route::group(['middleware' => 'merchant','prefix' => 'merchant'],function(){
    Route::get('/home',[MerchantController::class,'getHome']);
});

// End Merchant Route

// User Route Without Merchant Code


// User Route

// User Route With Merchant Code

// 