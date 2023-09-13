<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDF\LaporanSuratPdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Example Routes
Route::prefix('pdf')->group(function () {
    Route::get('surat', [LaporanSuratPdf::class, 'index']);
});
