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
    return view('welcome');
});

Route::get('/test',"SkeletonController@test");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/myself', 'SkeletonController@myself')->name('skeleton.myself');


// Authentication Route

Route::get('/register',[RegisterController::class, 'registerForm']);
Route::post('/register',[RegisterController::class, 'doRegister']);
Route::get('login',[LoginController::class, 'loginForm']);
Route::post('login',[LoginController::class, 'doLogin']);
Route::post('logout',[LoginController::class, 'doLogout']);

// End Authentication Route

// Admin Route


// End Admin Route