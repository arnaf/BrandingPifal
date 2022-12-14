<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryStockController;
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

require_once('includes/auth.php');
require_once('includes/drug.php');
require_once('includes/alkes.php');
require_once('includes/unit.php');
require_once('includes/cashier.php');



Route::get('/', function () {
    return view('/auth/login');
})->name('loginform');

Route::get('/register', function () {
    return view('components.auth.register');
})->name('registerform');


Route::post('/typeRegist', [RegisterController::class, 'registertype'])->name('registertype');

Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::resource('products', ProductController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::get('kategoris/list', [KategoriController::class, 'getKategoris'])->name('kategoris.list');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);

    Route::resource('penjualans', PenjualanController::class);

    Route::get('history_stoks', [HistoryStockController::class, 'index'])->name('history_stoks.index');;
    Route::get('history_stoks/list', [HistoryStockController::class, 'getHistories'])->name('history_stoks.list');
    Route::resource('history_stoks', HistoryStockController::class);

    Route::get('cetaknotacustomer/{id}', [PenjualanController::class, 'cetaknotacustomer'])->name('cetaknotacustomer');



    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('customers/list', [CustomerController::class, 'getCustomers'])->name('customers.list');
    Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::resource('customers', CustomerController::class);







});

