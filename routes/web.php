<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(\App\Http\Controllers\HomepageController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');

    Route::post('lapor', 'store')->name('lapor.store');
});

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Auth::routes(['register' =>false]);

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('siswas', \App\Http\Controllers\SiswaController::class)->except('show');

    Route::resource('kategoris', \App\Http\Controllers\KategoriController::class)->except('show');

    Route::resource('aspirasis', \App\Http\Controllers\AspirasiController::class)->only(['store', 'show']);

    Route::resource('pelaporans', \App\Http\Controllers\PelaporanController::class)->except(['edit', 'update']);

});
