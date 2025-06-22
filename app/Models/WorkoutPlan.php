<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'pivot_workout_plan');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
