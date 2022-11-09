<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DrugCategoryController;
    use App\Http\Controllers\DrugTypeController;
    use App\Http\Controllers\DrugController;
    use Maatwebsite\Excel\Facades\Excel;

        Route::get('/drugcategory/{id}', [DrugCategoryController::class, 'show'])->name('drugcategory');
        Route::get('/drugcategory', [DrugCategoryController::class, 'index'])->name('drugcategory');
        Route::post('/drugcategory', [DrugCategoryController::class, 'store']);
        Route::post('/drugcategory/{id}', [DrugCategoryController::class, 'edit']);
        Route::delete('/drugcategory/{id}', [DrugCategoryController::class, 'destroy']);


        Route::get('/drugtype/{id}', [DrugTypeController::class, 'show'])->name('drugtype');
        Route::get('/drugtype', [DrugTypeController::class, 'index'])->name('drugtype');
        Route::post('/drugtype', [DrugTypeController::class, 'store']);
        Route::post('/drugtype/{id}', [DrugTypeController::class, 'edit']);
        Route::delete('/drugtype/{id}', [DrugTypeController::class, 'destroy']);



        Route::get('/drug/{id}', [DrugController::class, 'show'])->name('drug');
        Route::get('/drug', [DrugController::class, 'index'])->name('drug');
        Route::post('/drug', [DrugController::class, 'store']);
        Route::post('/drug/{id}', [DrugController::class, 'edit']);
        Route::delete('/drug/{id}', [DrugController::class, 'destroy']);
        Route::get('exportdrug', [DrugController::class, 'export'])->name('exportdrug');

        Route::get('/drugdetails/{id}', [DrugController::class, 'showDetail'])->name('drugdetail');
        Route::post('/drugdetails/{id}', [DrugController::class, 'detailUpdate'])->name('drugdetail');

