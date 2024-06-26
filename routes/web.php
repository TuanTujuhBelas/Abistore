<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TransactionController; 
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/hello', function () {
    return 'Hello World';
});

Route::resource('products', ProductController::class);

Auth::routes(['register' => false]);

Route::get('logout', [LoginController::class, 'logout']);

Route::resource('transactions', TransactionController::class);

// Tambahkan rute untuk mengubah status transaksi
Route::get('transactions/{id}/status', [TransactionController::class, 'changeStatus'])->name('transactions.status');
Route::get('transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
