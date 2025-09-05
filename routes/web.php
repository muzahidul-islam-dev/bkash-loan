<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BkashController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/check-login', [AuthController::class, 'checkLogin'])->name('checkLogin');


Route::middleware('AuthCheck')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        });

        Route::prefix('service')->group(function () {
            Route::name('service.')->group(function () {
                Route::get('/all', [ServiceController::class, 'all'])->name('all');
                Route::get('/add', [ServiceController::class, 'add'])->name('add');
                Route::post('/store', [ServiceController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [ServiceController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [ServiceController::class, 'delete'])->name('delete');
            });
        });

        Route::get('/payment-configuration', [PaymentController::class, 'paymentConfigure'])->name('payment.configuration');
        Route::post('/payment-configuration-save', [PaymentController::class, 'paymentConfigureSave'])->name('payment.save');
    });
});

Route::get('/', [HomeController::class, 'home']);



Route::post('/bkash/pay', [BkashController::class, 'pay'])->name('bkashPayment');
Route::get('/success', [BkashController::class, 'callback'])->name('success');

