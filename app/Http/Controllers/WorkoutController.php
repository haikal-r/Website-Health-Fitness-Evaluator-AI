<?php

namespace App\Http\Controllers;

use App\Models\WorkoutPlan;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class WorkoutController extends BaseController
{
    public function index(GlobalService $service)
    {
        $workouts = WorkoutPlan::where('user_id', $this->user->id)->with('user')->get();

        return view('pages.workout.index', compact('workouts'));
    }

    public function show(Request $reqeust, string $id, GlobalService $service)
    {
        $data = $service->getDataWorkoutPlan($id);

        return view('pages.workout.detail', compact('data'));
    }
}
