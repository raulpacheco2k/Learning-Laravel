<?php

use \App\Http\Controllers\BrandController;

Route::resource('/brands', BrandController::class)->middleware('auth');
