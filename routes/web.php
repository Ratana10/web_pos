<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');
Route::get('/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');

Route::middleware('Login')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/add', [UserController::class, 'store'])->name('user.addNew');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::post('/add', [ProductController::class, 'store'])->name('product.addNew');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::get('/barcode', [ProductController::class, 'ProductBarcode'])->name('product.barcode');
    });

    Route::prefix('supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
        Route::post('/add', [SupplierController::class, 'store'])->name('supplier.addNew');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('/update', [SupplierController::class, 'update'])->name('supplier.update');
        Route::get('/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.delete');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::post('/add', [OrderController::class, 'store'])->name('order.addNew');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::put('/update', [OrderController::class, 'update'])->name('order.update');
        Route::get('/delete/{id}', [OrderController::class, 'destroy'])->name('order.delete');
    });

});







