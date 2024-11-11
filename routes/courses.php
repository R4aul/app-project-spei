<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::prefix('/courses')->controller(CourseController::class)->group(function(){
  Route::get('/','index')->name('courses.index');  
  Route::get('/create','create')->name('courses.create');  
  Route::post('/store','store')->name('courses.store');  
  Route::get('/{course}/edit','edit')->name('courses.edit');  
  Route::put('/update/{course}','update')->name('courses.update');  
})->middleware('auth.basic');
