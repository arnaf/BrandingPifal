<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DrugCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DoctorController;




Route::group([
    'middleware' => 'guest',
], function() {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // Route::get('/dashboard', [AuthController::class, 'login'])->name('login');
});


Route::group([
    'middleware' => 'auth',
], function() {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');







    Route::get('/role/{id}', [RoleController::class, 'show'])->name('role');
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::post('/role', [RoleController::class, 'store']);
    Route::post('/role/{id}', [RoleController::class, 'edit']);
    Route::delete('/role/{id}', [RoleController::class, 'destroy']);

    Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor');
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::post('/doctor', [DoctorController::class, 'store']);
    Route::post('/doctor/{id}', [DoctorController::class, 'edit']);
    Route::delete('/doctor/{id}', [DoctorController::class, 'destroy']);



    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);



});
