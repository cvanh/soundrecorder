<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReportController::class, 'index'])->name('index');
Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
Route::get('report/detail/{id}', [ReportController::class, 'detail'])->name('report.view');
Route::get('report/export', [ReportController::class, 'export']);
Route::post('report/store', [ReportController::class, 'store'])->name('report.store');