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
        Schema::create('workout_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constant('users');
            $table->foreignId('workout_id')->constant('workout');
            $table->enum('workout_time', ['morning', 'afternoon', 'evening', 'night']);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_plan');
    }
};
