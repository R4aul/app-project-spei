<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressProfileController;

Route::prefix('/progress')->controller(ProgressProfileController::class)->group(function () {
    Route::get('/', 'index')->name('progress.index');
})->middleware('auth.basic');

