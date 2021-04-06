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

Route::group(['middleware' => 'admin'],function(){
    // Voucher
    Route::get('/voucher',[VoucherController::class, 'get']);
    Route::post('/voucher',[VoucherController::class, 'create']);
    Route::post('/voucher/{id}',[VoucherController::class, 'delete']);
    Route::get('/voucher/{id}',[VoucherController::class, 'editForm']);
    Route::post('/voucher/edit',[VoucherController::class, 'doEdit']);
    // Product
    Route::get('/product',[ProductController::class, 'get']);
    Route::post('/product',[ProductController::class, 'create']);
    Route::post('/product/{id}',[ProductController::class, 'delete']);
    Route::get('/product/{id}',[ProductController::class, 'editForm']);
    Route::post('/product/edit',[ProductController::class, 'doEdit']);
    // Type
    Route::get('/type',[TypeController::class, 'get']);
    Route::post('/type',[TypeController::class, 'create']);
    Route::post('/type/{id}',[TypeController::class, 'delete']);
    Route::get('/type/{id}',[TypeController::class, 'editForm']);
    Route::post('/type/edit',[TypeController::class, 'doEdit']);
    // Category
    Route::get('/category',[CategoryController::class, 'get']);
    Route::post('/category',[CategoryController::class, 'create']);
    Route::post('/category/{id}',[CategoryController::class, 'delete']);
    Route::get('/category/{id}',[CategoryController::class, 'editForm']);
    Route::post('/category/edit',[CategoryController::class, 'doEdit']);
    // Flash
    Route::get('/flash',[FlashController::class, 'get']);
    Route::post('/flash',[FlashController::class, 'create']);
    Route::post('/flash/{id}',[FlashController::class, 'delete']);
    Route::get('/flash/{id}',[FlashController::class, 'editForm']);
    Route::post('/flash/edit',[FlashController::class, 'doEdit']);
});

Route::group(['middleware' => 'superadmin'],function(){
    // Admin
    Route::get('/admin',[AdminController::class, 'get']);
    Route::post('/admin',[AdminController::class, 'create']);
    Route::post('/admin/{id}',[AdminController::class, 'delete']);
    Route::get('/admin/{id}',[AdminController::class, 'editForm']);
    Route::post('/admin/edit',[AdminController::class, 'doEdit']);
    // Merchant
    Route::get('/merchant',[MerchantController::class, 'get']);
    Route::post('/merchant',[MerchantController::class, 'create']);
    Route::post('/merchant/{id}',[MerchantController::class, 'delete']);
    Route::get('/merchant/{id}',[MerchantController::class, 'editForm']);
    Route::post('/merchant/edit',[MerchantController::class, 'doEdit']);
});