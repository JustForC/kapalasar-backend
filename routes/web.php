<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\MerchantController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\TypeController;
use App\Http\Controllers\Dashboard\VoucherController;
use App\Http\Controllers\Dashboard\FlashController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\Dashboard\HistoryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AdvertisementController;
use App\Http\Controllers\Dashboard\MailController;
use App\Http\Controllers\Dashboard\UserMailController;
use App\Http\Controllers\Dashboard\CatalogController;
use App\Http\Controllers\Dashboard\MailHistoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\PushNotificationController;

Route::get('/send-notification', [PushNotificationController::class, 'send']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('flash_sale', [HomeController::class, 'flash_sale'])->name('flash_sale');
Route::get('account', [HomeController::class, 'account'])->name('account');

Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('payment', [HomeController::class, 'payment'])->name('payment');

Route::post('finish', [HomeController::class, 'finish'])->name('finish');

// Authentication
Route::get('register', [RegisterController::class, 'show']);
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('login', [LoginController::class, 'show']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LogoutController::class, 'logout']);

Route::middleware('admin')->group(function(){
    Route::prefix('product')->group(function(){
        Route::prefix('item')->group(function(){
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
    });
    
    Route::prefix('ads')->group(function(){
        Route::get('/', [AdvertisementController::class, 'index'])->name('ads.index');
        Route::get('create', [AdvertisementController::class, 'create'])->name('ads.create');
        Route::post('store', [AdvertisementController::class, 'store'])->name('ads.store');
        Route::get('edit/{id}', [AdvertisementController::class, 'edit'])->name('ads.edit');
        Route::put('update/{id}', [AdvertisementController::class, 'update'])->name('ads.update');
        Route::delete('delete/{id}', [AdvertisementController::class, 'destroy'])->name('ads.delete');
        Route::get('data', [AdvertisementController::class, 'data'])->name('ads.data');
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
        Route::prefix('flash_sale')->group(function(){
            Route::get('/', [FlashController::class, 'index'])->name('flash.index');
            Route::get('create', [FlashController::class, 'create'])->name('flash.create');
            Route::post('store', [FlashController::class, 'store'])->name('flash.store');
            Route::get('edit/{id}', [FlashController::class, 'edit'])->name('flash.edit');
            Route::put('update/{id}', [FlashController::class, 'update'])->name('flash.update');
            Route::delete('delete/{id}', [FlashController::class, 'destroy'])->name('flash.delete');
            Route::get('data', [FlashController::class, 'data'])->name('flash.data');
        });
    });
    
    Route::prefix('transaction')->group(function(){
        Route::get('/', [TransactionController::class, 'index'])->name('transaction.index');
        Route::get('create', [TransactionController::class, 'create'])->name('transaction.create');
        Route::post('store', [TransactionController::class, 'store'])->name('transaction.store');
        Route::get('edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
        Route::put('update/{id}', [TransactionController::class, 'update'])->name('transaction.update');
        Route::delete('delete/{id}', [TransactionController::class, 'destroy'])->name('transaction.delete');
        Route::get('data', [TransactionController::class, 'data'])->name('transaction.data');
    });
    
    Route::prefix('history')->group(function(){
        Route::get('/', [HistoryController::class, 'index'])->name('history.index');
        Route::get('create', [HistoryController::class, 'create'])->name('history.create');
        Route::post('store', [HistoryController::class, 'store'])->name('history.store');
        Route::get('edit/{id}', [HistoryController::class, 'edit'])->name('history.edit');
        Route::put('update/{id}', [HistoryController::class, 'update'])->name('history.update');
        Route::delete('delete/{id}', [HistoryController::class, 'destroy'])->name('history.delete');
        Route::get('data', [HistoryController::class, 'data'])->name('history.data');
    });
    
    Route::prefix('mail')->group(function(){
        Route::prefix('usermail')->group(function(){
            Route::get('/', [UserMailController::class, 'index'])->name('usermail.index');
            Route::post('send', [UserMailController::class, 'send'])->name('usermail.send');
        });
        Route::prefix('blastmail')->group(function(){
            Route::get('/', [MailController::class, 'index'])->name('blastmail.index');
            Route::post('send', [MailController::class, 'send'])->name('blastmail.send');
        });
        Route::prefix('history')->group(function(){
            Route::get('/', [MailHistoryController::class, 'index'])->name('mailhistory.index');
            Route::get('create', [MailHistoryController::class, 'create'])->name('mailhistory.create');
            Route::post('store', [MailHistoryController::class, 'store'])->name('mailhistory.store');
            Route::get('edit/{id}', [MailHistoryController::class, 'edit'])->name('mailhistory.edit');
            Route::put('update/{id}', [MailHistoryController::class, 'update'])->name('mailhistory.update');
            Route::delete('delete/{id}', [MailHistoryController::class, 'destroy'])->name('mailhistory.delete');
            Route::get('data', [MailHistoryController::class, 'data'])->name('mailhistory.data');
        });
    });
});

// Bagian laen
Route::middleware('superadmin')->group(function(){
    Route::prefix('account')->group(function(){
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
    });
});


Route::prefix('catalog')->group(function(){
    Route::middleware('admin')->group(function(){
        Route::get('create', [CatalogController::class, 'create'])->name('catalog.create');
        Route::post('store', [CatalogController::class, 'store'])->name('catalog.store');
        Route::delete('delete/{id}', [CatalogController::class, 'destroy'])->name('catalog.delete');
    });
    Route::get('download/{id}',[CatalogController::class,'download'])->name('catalog.download');
    Route::get('data', [CatalogController::class, 'data'])->name('catalog.data');
    Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');
});



//
Route::prefix('{code}')->group(function(){
    Route::get('/', [CodeController::class, 'index'])->name('code.index');
    Route::get('flash_sale', [CodeController::class, 'flash_sale'])->name('code.flash_sale');
    Route::get('account', [CodeController::class, 'account'])->name('code.account');

    Route::get('checkout', [CodeController::class, 'checkout'])->name('code.checkout');
    Route::get('payment', [CodeController::class, 'payment'])->name('code.payment');

    Route::post('finish', [CodeController::class, 'finish'])->name('code.finish');

    // Authentication
    Route::get('register', [CodeController::class, 'registerShow'])->name('code.registerShow');
    Route::post('register', [CodeController::class, 'register'])->name('code.register');
    Route::get('login', [CodeController::class, 'loginShow'])->name('code.loginShow');
    Route::post('login', [CodeController::class, 'login'])->name('code.login');
    Route::get('logout', [CodeController::class, 'logout'])->name('code.logout');
});


