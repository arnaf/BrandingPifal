<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugCategoryController;

 Route::get('/drugcategory/{id}', [DrugCategoryController::class, 'show'])->name('drugcategory');
 Route::get('/drugcategory', [DrugCategoryController::class, 'index'])->name('drugcategory');
 Route::post('/drugcategory', [DrugCategoryController::class, 'store']);
 Route::post('/drugcategory/{id}', [DrugCategoryController::class, 'edit']);
 Route::delete('/drugcategory/{id}', [DrugCategoryController::class, 'destroy']);

 