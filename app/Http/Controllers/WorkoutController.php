<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\WorkoutPlan;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class WorkoutController extends BaseController
{
    public function index(GlobalService $service)
    {
        $data = $service->getDataWorkoutPlan();

        return view('workout', compact('data'));
    }
}
