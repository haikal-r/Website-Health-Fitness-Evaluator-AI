<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\MealPlan;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $mealPlans = MealPlan::where('user_id', auth()->user()->id)->get();

        $data = [];
        foreach($mealPlans as $mealPlan) {
            $meals = Food::where('meal_plan_id', $mealPlan->id)->get();
            $meal = $meals->makeHidden(['id', 'meal_plan_id', 'updated_at', 'created_at'])->toArray();
            $item['type'] = $mealPlan->meal_time;
            $item['foods'] = $meal;

            $data[] = $item;
        }

        return view('food', compact('data'));
    }
}
