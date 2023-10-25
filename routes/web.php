<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

Auth::routes();
Route::resource('tag', TagController::class);
Route::get('/export-tags', [TagController::class, 'exportPDF']);
Route::get('/reload-captcha', [HomeController::class, 'reloadCaptcha']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/tag-import', [TagController::class, 'import'])->name('tag.import');
Route::get('/tag-export', [TagController::class, 'export'])->name('tag.export');


