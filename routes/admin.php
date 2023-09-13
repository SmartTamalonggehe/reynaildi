<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\SuratController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin');

    Route::resource('jenis', JenisController::class);
    Route::resource('surat', SuratController::class);
    Route::get('grafik', function () {
        return view('admin.grafik.index');
    })->name('grafik.index');
    Route::get('laporan', function () {
        return view('admin.laporan.index');
    })->name('laporan.index');
});
