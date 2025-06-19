<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\MealPlan;
use App\Models\Plan;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class FoodController extends BaseController
{
    public function index(GlobalService $service)
    {
        $data = $service->getDataMealPlan();
        return view('food', compact('data'));
    }
}
