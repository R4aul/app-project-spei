<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        $profiles = Profile::with(['employees.courses' => function ($query) {
            $query->where('completed', true);
        }])->get();

        $data = $profiles->map(function ($profile) {
            $totalCourses = $profile->employees->flatMap->courses->count();
            $completedCourses = $profile->employees->flatMap->courses->where('completed', true)->count();

            $completionRate = $totalCourses > 0
                ? ($completedCourses / $totalCourses) * 100
                : 0;

            return [
                'profile_id' => $profile->id,
                'profile_name' => $profile->name_profile,
                'completion_rate' => round($completionRate, 2),
            ];
        });

        // Find profiles with highest and lowest completion
        $highest = $data->sortByDesc('completion_rate')->first();
        $lowest = $data->sortBy('completion_rate')->first();
        
        return view('dashboard',[
            'all_profiles' => $data,
            'highest_completion' => $highest,
            'lowest_completion' => $lowest,

        ]);
    }
}
