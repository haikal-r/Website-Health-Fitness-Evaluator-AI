<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food'; // Nama tabel tanpa 's' di akhir

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = ['name', 'image', 'calories', 'protein', 'fat', 'carbs'];
}
