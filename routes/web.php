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

Route::view('/', 'backoffice.layout.index')->name('base')->middleware('auth');

Route::prefix('brands')->group(base_path('routes/group/web/brand.php'));
Route::prefix('products')->group(base_path('routes/group/web/products.php'));

require __DIR__ . '/auth.php';
