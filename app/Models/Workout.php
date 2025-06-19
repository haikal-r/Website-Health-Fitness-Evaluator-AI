<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Workout extends Model
{
    use HasFactory;

    protected $table = 'workouts';

    protected $guarded = ['id'];

    public function workoutPlans(): BelongsToMany
    {
        return $this->belongsToMany(WorkoutPlan::class, 'pivot_workout_plan', 'workout_id', 'workout_plan_id');
    }
}
