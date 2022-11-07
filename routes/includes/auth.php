<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;




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





    


});
