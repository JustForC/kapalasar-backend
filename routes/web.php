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
    //voucher
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
});