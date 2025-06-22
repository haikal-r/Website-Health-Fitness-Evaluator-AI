<?php

namespace App\Http\Controllers;

use App\Services\GlobalService;

class FoodController extends BaseController
{
    public function index(GlobalService $service)
    {
        $data = $service->getDataMealPlan();
        return view('pages.food.detail', compact('data'));
    }
}
