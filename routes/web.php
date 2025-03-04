<?php

use App\Http\Controllers\DashboardController;
use App\Models\DataTanah;
use App\Models\DataKesesuaian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DataTanahController;
use App\Http\Controllers\DataTanamanController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\DataSubkriteriaController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('kriteria', KriteriaController::class);
Route::resource('tanaman',DataTanamanController::class);
Route::resource('tanah', DataTanahController::class);
Route::resource('subkriteria', DataSubkriteriaController::class);
Route::get('subkriteria/detail/{id_tanaman}', [DataSubkriteriaController::class, 'detail'])->name('subkriteria.detail');
Route::get('perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
Route::delete('/tanaman/deletejson/{id_kriteria}/{id_tanaman}/{loop}', [DataTanamanController::class, 'destroyJSON'])->name('subkriteria.destroyJSON');