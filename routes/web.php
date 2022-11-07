<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view('/auth/login');
})->name('loginform');

Route::get('/register', function () {
    return view('components.auth.register');
})->name('registerform');


Route::post('/typeRegist', [RegisterController::class, 'registertype'])->name('registertype');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

