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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/temps', [App\Http\Controllers\HomeController::class, 'temps'])->name('temps');
Route::get('/statistics', [App\Http\Controllers\HomeController::class, 'static'])->name('static');
Route::get('/main', [App\Http\Controllers\HomeController::class, 'main'])->name('main');
Route::get('/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
