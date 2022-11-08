<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UnitController;

        Route::get('/unit/{id}', [UnitController::class, 'show'])->name('unit');
        Route::get('/unit', [UnitController::class, 'index'])->name('unit');
        Route::post('/unit', [UnitController::class, 'store']);
        Route::post('/unit/{id}', [UnitController::class, 'edit']);
        Route::delete('/unit/{id}', [UnitController::class, 'destroy']);

