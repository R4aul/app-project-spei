<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Exports\EmployeeExportProgres;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth.basic');

Route::post('/export-porgress',function(){
    return Excel::download(new EmployeeExportProgres, 'progreso.xlsx');
})->name('export.progress');