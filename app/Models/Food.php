<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $guarded = ['id'];

    public function mealPlans(): BelongsToMany
    {
        return $this->belongsToMany(MealPlan::class, 'pivot_meal_plan', 'food_id', 'meal_plan_id')
            ->withPivot('meal_time')
            ->withTimestamps();
    }
}
