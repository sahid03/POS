<?php

use App\Http\Controllers\Admin\CashierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('cashier.dashboard');
Route::get('/success/{id}', [HomeController::class, 'success'])->name('cashier.success');
Route::get('/print/{id}', [HomeController::class, 'print'])->name('cashier.cetak');

Route::get('order-list', [HomeController::class, 'order_list'])->name('cashier.order-list');
Route::post('order-list', [HomeController::class, 'order_list_status'])->name('cashier.order-list.status');

Route::prefix('admin')->middleware(['auth', isAdmin::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('menu', MenuController::class);
    Route::resource('kasir', CashierController::class);
    Route::get('pendapatan', [IncomeController::class, 'index'])->name('admin.income.index');
});
