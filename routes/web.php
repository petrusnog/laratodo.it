<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::get('/', HomeController::class);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::prefix('tasks')->name('tasks.')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('index');
    });
});