<?php

namespace App\Services;

use App\Models\Food;
use App\Models\Workout;

class GlobalService 
{

    protected $user;

    public function __construct()
    {
        $this->user = auth()->user() ?? null;
    }

    public function getDataMealPlan()
    {
        return Food::with([
            'mealPlans' => function ($query) {
                $query->where('user_id', $this->user->id)->where('is_active', 1);
            }
        ])
            ->get()
            ->map(function ($food) {
                $mealPlan = $food->mealPlans->first();
                $food->meal_time = $mealPlan?->pivot->meal_time;
                return $food;
            })
            ->filter(fn($food) => $food->meal_time)
            ->groupBy('meal_time')
            ->map(function ($group, $type) {
                return [
                    'type' => $type,
                    'foods' => $group->values()
                ];
            })
            ->values();
    }

    public function getDataWorkoutPlan()
    {
        return Workout::with([
            'workoutPlans' => function ($query) {
                $query->where('user_id', $this->user->id)->where('is_active', 1);
            }
        ])
            ->get();
    }
}
