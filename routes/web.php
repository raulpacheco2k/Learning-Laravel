<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\BrandController;

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

Route::view('/', 'web.backoffice.layout.index')->name('base')->middleware('auth');
Route::resource('/produtos', ProductController::class)->middleware('auth');
Route::resource('/marcas', BrandController::class)->middleware('auth');
require __DIR__ . '/auth.php';
