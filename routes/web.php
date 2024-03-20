<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
    Route::get('report/detail/{id}', [ReportController::class, 'detail'])->name('report.view');
    Route::get('report/export', [ReportController::class, 'export']);
    Route::post('report/store', [ReportController::class, 'store'])->name('report.store');
});

require __DIR__ . '/auth.php';