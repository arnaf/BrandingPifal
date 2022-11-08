<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AlkesClasificationController;


        Route::get('/alkesclasification/{id}', [AlkesClasificationController::class, 'show'])->name('alkesclasification');
        Route::get('/alkesclasification', [AlkesClasificationController::class, 'index'])->name('alkesclasification');
        Route::post('/alkesclasification', [AlkesClasificationController::class, 'store']);
        Route::post('/alkesclasification/{id}', [AlkesClasificationController::class, 'edit']);
        Route::delete('/alkesclasification/{id}', [AlkesClasificationController::class, 'destroy']);
