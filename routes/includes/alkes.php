<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AlkesClasificationController;
    use App\Http\Controllers\AlkesController;


        Route::get('/alkesclasification/{id}', [AlkesClasificationController::class, 'show'])->name('alkesclasification');
        Route::get('/alkesclasification', [AlkesClasificationController::class, 'index'])->name('alkesclasification');
        Route::post('/alkesclasification', [AlkesClasificationController::class, 'store']);
        Route::post('/alkesclasification/{id}', [AlkesClasificationController::class, 'edit']);
        Route::delete('/alkesclasification/{id}', [AlkesClasificationController::class, 'destroy']);


        Route::get('/alkes/{id}', [AlkesController::class, 'show'])->name('alkes');
        Route::get('/alkes', [AlkesController::class, 'index'])->name('alkes');
        Route::post('/alkes', [AlkesController::class, 'store']);
        Route::post('/alkes/{id}', [AlkesController::class, 'edit']);
        Route::delete('/alkes/{id}', [AlkesController::class, 'destroy']);
