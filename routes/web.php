<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::resource('/', ImageController::class);
