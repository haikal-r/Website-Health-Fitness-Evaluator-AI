<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;
    
    protected $table = 'meal_plan'; // Nama tabel tanpa 's' di akhir

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = ['user_id', 'meal_time'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
