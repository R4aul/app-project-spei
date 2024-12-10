<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Porcentaje de avance por perfiles
        $profilesProgress = \App\Models\Profile::with(['employees.courses'])
            ->get()
            ->map(function ($profile) {
                $totalCourses = $profile->employees->flatMap->courses->count();
                $completedCourses = $profile->employees->flatMap->courses->filter(function ($course) {
                    return $course->pivot->completed && $course->pivot->grade >= 8;
                })->count();

                $percentage = $totalCourses > 0 ? ($completedCourses / $totalCourses) * 100 : 0;

                return [
                    'profile' => $profile->name_profile,
                    'progress' => round($percentage, 2),
                ];
            });

        $highestProfile = $profilesProgress->sortByDesc('progress')->first();
        $lowestProfile = $profilesProgress->sortBy('progress')->first();

        // Cumplimiento por células
        $cellsProgress = \App\Models\Cell::with(['employees.courses'])
            ->get()
            ->map(function ($cell) {
                $totalCourses = $cell->employees->flatMap->courses->count();
                $completedCourses = $cell->employees->flatMap->courses->filter(function ($course) {
                    return $course->pivot->completed && $course->pivot->grade >= 8;
                })->count();

                $percentage = $totalCourses > 0 ? ($completedCourses / $totalCourses) * 100 : 0;

                return [
                    'cell' => $cell->name_cell,
                    'progress' => round($percentage, 2),
                ];
            });

        $highestCell = $cellsProgress->sortByDesc('progress')->first();
        $lowestCell = $cellsProgress->sortBy('progress')->first();

        // Cumplimiento por cursos
        $coursesProgress = \App\Models\Course::with(['employees'])
            ->get()
            ->map(function ($course) {
                $totalAssignments = $course->employees->count();
                $completedAssignments = $course->employees->filter(function ($employee) use ($course) {
                    $pivot = $employee->pivot;
                    return $pivot->completed && $pivot->grade >= 8;
                })->count();

                $percentage = $totalAssignments > 0 ? ($completedAssignments / $totalAssignments) * 100 : 0;

                return [
                    'course' => $course->name_course,
                    'progress' => round($percentage, 2),
                ];
            });

        $highestCourse = $coursesProgress->sortByDesc('progress')->first();
        $lowestCourse = $coursesProgress->sortBy('progress')->first();

        return view('dashboard', compact(
            'profilesProgress',
            'highestProfile',
            'lowestProfile',
            'cellsProgress',
            'highestCell',
            'lowestCell',
            'coursesProgress',
            'highestCourse',
            'lowestCourse'
        ));
    }
}
