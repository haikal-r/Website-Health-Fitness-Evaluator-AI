<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pivot_meal_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_plan_id')->constant('meal_plans')->onDelete('cascade');
            $table->foreignId('food_id')->constant('foods')->onDelete('cascade');
            $table->enum('meal_time', ['breakfast', 'lunch', 'dinner']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_meal_plan');
    }
};
