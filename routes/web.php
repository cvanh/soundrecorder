<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ReportController::class, 'index'])->name('index');
Route::get('uploads/create', [ReportController::class, 'create'])->name('uploads.create');
Route::post('uploads/store', [ReportController::class, 'store'])->name('uploads.store');