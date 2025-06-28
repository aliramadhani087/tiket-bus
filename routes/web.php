<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsCustomer;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/admin/laporan', [LaporanController::class, 'index']);
        Route::get('/admin/customers', [CustomerController::class, 'index']);
        Route::resource('/admin/ticket', TicketController::class);
        Route::get('/admin/ticket/{id}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
        Route::put('/admin/ticket/{id}', [TicketController::class, 'update'])->name('ticket.update');
        Route::resource('/admin/transaction', TransactionController::class);
    });

    Route::middleware([IsCustomer::class])->group(function () {
        Route::resource('/customer/transaction', TransactionController::class);
        Route::get('/cetakbukti/{id}', [TransactionController::class, 'invoice']);
    });

});