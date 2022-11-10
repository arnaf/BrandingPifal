<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CashierController;
    use App\Http\Controllers\DrugTypeController;
    use App\Http\Controllers\DrugController;
    use Maatwebsite\Excel\Facades\Excel;


    Route::get('/cashier/{id}', [CashierController::class, 'show'])->name('cashier');
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier');
    Route::post('/cashier', [CashierController::class, 'store']);
    Route::post('/cashier/{id}', [CashierController::class, 'edit']);
    Route::delete('/cashier/{id}', [CashierController::class, 'destroy']);

