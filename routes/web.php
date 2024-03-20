<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReportController::class, 'index'])->name('index');
Route::get('uploads/create', [ReportController::class, 'create'])->name('uploads.create');
Route::get('uploads/detail/{id}', [ReportController::class, 'detail'])->name('uploads.view');
Route::get('uploads/export', [ReportController::class, 'export']);
Route::post('uploads/store', [ReportController::class, 'store'])->name('uploads.store');