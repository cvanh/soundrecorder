<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('uploads/', [ReportController::class, 'index'])->name('uploads.index');
Route::get('uploads/create', [ReportController::class, 'create'])->name('uploads.create');
Route::post('uploads/store', [ReportController::class, 'store'])->name('uploads.store');