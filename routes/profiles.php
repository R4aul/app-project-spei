<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressProfileController;
use App\Models\Employee;
use App\Models\Program;
use App\Models\Profile;

Route::prefix('/progress')->controller(ProgressProfileController::class)->group(function () {
    Route::get('/', 'index')->name('progress.index');
})->middleware('auth.basic');

Route::get('/test', function () {
    $data = [
        5 => [
            'completion_date'=> '30-03-2022',
            'completed'=> true,
            'grade'=>8
        ]
    ];

    $employee = Employee::find(1);
    return $employee->courses()->sync($data);
    //$employee->courses()->sync($data);
    
    return 'success';
});
