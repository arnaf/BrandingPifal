<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DrugCategoryController;


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


    Route::get('/drugcategory/{id}', [DrugCategoryController::class, 'show'])->name('drugcategory');
    Route::get('/drugcategory', [DrugCategoryController::class, 'index'])->name('drugcategory');
    Route::post('/drugcategory', [DrugCategoryController::class, 'store']);
    Route::post('/drugcategory/{id}', [DrugCategoryController::class, 'edit']);
    Route::delete('/drugcategory/{id}', [DrugCategoryController::class, 'destroy']);


});
