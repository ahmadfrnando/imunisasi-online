<?php

use App\Models\Patient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Notifications\PenyuluhanNotification;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporan', [PDFController::class, 'cetak'])->name('laporan');

Route::get('/login', function () {
    return view('login')
        ->with('title', 'Login');
});