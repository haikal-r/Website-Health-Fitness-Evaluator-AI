<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'pivot_meal_plan')->withPivot('meal_time');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
