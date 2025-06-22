<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use App\Services\GlobalService;
use Illuminate\Support\Facades\Request;

class FoodController extends BaseController
{
    public function index()
    {
        $foods = MealPlan::where('user_id', $this->user->id)->with('user')->get();

        return view('pages.food.index', compact('foods'));
    }

    public function show(Request $request, string $id, GlobalService $service)
    {
        $data = $service->getDataMealPlan($id);

        return view('pages.food.detail', compact('data'));
    }
}
