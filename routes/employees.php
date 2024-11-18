<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::prefix('/employees')->controller(EmployeeController::class)->group(function(){
  Route::get('/','index')->name('employees.index');  
  Route::get('/create','create')->name('employees.create');  
  Route::post('/store','store')->name('employees.store');  
  Route::get('/{employee}/edit','edit')->name('employees.edit');  
  Route::put('/update/{employee}','update')->name('employees.update');  
})->middleware('auth.basic');
