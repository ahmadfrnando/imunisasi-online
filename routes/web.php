<?php

use App\Models\Patient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Notifications\PenyuluhanNotification;

Route::get('/', function () {
    return view('home');
});

Route::get('/laporan', [PDFController::class, 'cetak'])->name('laporan');
Route::get('/laporan-berjangka', [PDFController::class, 'cetakBerjangka'])->name('cetak.laporan-berjangka');
Route::get('/laporan-perbalita/{patient_id}', [PDFController::class, 'cetakperbalita'])->name('laporan.perbalita');

Route::get('/login', function () {
    return view('login')
        ->with('title', 'Login');
});