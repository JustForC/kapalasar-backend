<?php

use App\Http\Controllers\SkeletonController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\MerchantController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\TypeController;
use App\Http\Controllers\Dashboard\VoucherController;
use App\Http\Controllers\Dashboard\FlashController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Auth\AuthenticationController;

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

// Route::group(['middleware' => 'superadmin'],function(){
//     // Admin
//     Route::get('/admin',[AdminController::class, 'get']);
//     Route::post('/admin',[AdminController::class, 'create']);
//     Route::post('/admin/{id}',[AdminController::class, 'delete']);
//     Route::get('/admin/{id}',[AdminController::class, 'editForm']);
//     Route::post('/admin/edit',[AdminController::class, 'doEdit']);
//     // Merchant
//     Route::get('/merchant',[MerchantController::class, 'get']);
//     Route::post('/merchant',[MerchantController::class, 'create']);
//     Route::post('/merchant/{id}',[MerchantController::class, 'delete']);
//     Route::get('/merchant/{id}',[MerchantController::class, 'editForm']);
//     Route::post('/merchant/edit',[MerchantController::class, 'doEdit']);
//     // User
//     Route::get('/user',[UserController::class, 'get']);
//     Route::post('/user',[UserController::class, 'create']);
//     Route::post('/user/{id}',[UserController::class, 'delete']);
//     Route::get('/user/{id}',[UserController::class, 'editForm']);
//     Route::post('/user/edit',[UserController::class, 'doEdit']);
// });

// Authentication
Route::get('/register',[AuthenticationController::class, 'registerForm']);
Route::post('/register',[AuthenticationController::class, 'doRegister']);
Route::get('/login',[AuthenticationController::class, 'loginForm']);
Route::post('/login',[AuthenticationController::class, 'doLogin']);
Route::get('/logout',[AuthenticationController::class, 'doLogout']);


Route::middleware('admin')->group(function(){

});


Route::prefix('product')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('data', [ProductController::class, 'data'])->name('product.data');
});
Route::prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('data', [CategoryController::class, 'data'])->name('category.data');
});

Route::prefix('promotion')->group(function(){
    Route::prefix('voucher')->group(function(){
        Route::get('/', [VoucherController::class, 'index'])->name('voucher.index');
        Route::get('create', [VoucherController::class, 'create'])->name('voucher.create');
        Route::post('store', [VoucherController::class, 'store'])->name('voucher.store');
        Route::get('edit/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
        Route::put('update/{id}', [VoucherController::class, 'update'])->name('voucher.update');
        Route::delete('delete/{id}', [VoucherController::class, 'destroy'])->name('voucher.delete');
        Route::get('data', [VoucherController::class, 'data'])->name('voucher.data');
    });
    Route::prefix('type')->group(function(){
        Route::get('/', [TypeController::class, 'index'])->name('type.index');
        Route::get('create', [TypeController::class, 'create'])->name('type.create');
        Route::post('store', [TypeController::class, 'store'])->name('type.store');
        Route::get('edit/{id}', [TypeController::class, 'edit'])->name('type.edit');
        Route::put('update/{id}', [TypeController::class, 'update'])->name('type.update');
        Route::delete('delete/{id}', [TypeController::class, 'destroy'])->name('type.delete');
        Route::get('data', [TypeController::class, 'data'])->name('type.data');
    });
    Route::prefix('flash')->group(function(){
        Route::get('/', [FlashController::class, 'index'])->name('flash.index');
        Route::get('create', [FlashController::class, 'create'])->name('flash.create');
        Route::post('store', [FlashController::class, 'store'])->name('flash.store');
        Route::get('edit/{id}', [FlashController::class, 'edit'])->name('flash.edit');
        Route::put('update/{id}', [FlashController::class, 'update'])->name('flash.update');
        Route::delete('delete/{id}', [FlashController::class, 'destroy'])->name('flash.delete');
        Route::get('data', [FlashController::class, 'data'])->name('flash.data');
    });
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
    Route::get('data', [AdminController::class, 'data'])->name('admin.data');
});
Route::prefix('merchant')->group(function(){
    Route::get('/', [MerchantController::class, 'index'])->name('merchant.index');
    Route::get('create', [MerchantController::class, 'create'])->name('merchant.create');
    Route::post('store', [MerchantController::class, 'store'])->name('merchant.store');
    Route::get('edit/{id}', [MerchantController::class, 'edit'])->name('merchant.edit');
    Route::put('update/{id}', [MerchantController::class, 'update'])->name('merchant.update');
    Route::delete('delete/{id}', [MerchantController::class, 'destroy'])->name('merchant.delete');
    Route::get('data', [MerchantController::class, 'data'])->name('merchant.data');
});
Route::prefix('user')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('data', [UserController::class, 'data'])->name('user.data');
});