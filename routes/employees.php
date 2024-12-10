<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeCourseController;
use App\Http\Controllers\CellController;

Route::prefix('/employees')->controller(EmployeeController::class)->group(function(){
  Route::get('/','index')->name('employees.index');  
  Route::get('/create','create')->name('employees.create');  
  Route::post('/store','store')->name('employees.store');  
  Route::get('/{employee}/show','show')->name('employees.show');
  Route::patch('/{employee}/low','low')->name('employees.low');
  Route::get('/{employee}/edit','edit')->name('employees.edit');  
  Route::put('/update/{employee}','update')->name('employees.update');  
})->middleware('auth.basic');

Route::prefix('/course-employee')->controller(EmployeeCourseController::class)->group(function(){
  Route::put('/{employee}/assignCourseEmployee','assignCourseEmployee')
    ->name('course-employee.assignCourseEmployee');
  Route::put('/course-employee/{employee}/{course}/assign-grade','assignGrade')
    ->name('course-employee.assignGrade');
})->middleware('auth.basic');

Route::resource('/cells', CellController::class)
  ->except('show');