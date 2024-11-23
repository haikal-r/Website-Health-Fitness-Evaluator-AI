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
        Schema::create('biodata_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constant('users');
            $table->integer('age')->nullable();
            $table->enum('gender', ['female', 'male']);
            $table->integer('weight');
            $table->integer('height');
            $table->decimal('bmi');
            $table->date('birth_date');
            $table->enum('fitness_goal', ['weight_loss', 'muscle_gain', 'weight_gain'])->nullable();
            $table->enum('experience_level', ['beginner', 'moderate', 'expert'])->nullable();
            $table->enum('activity_level', ['not_active', 'quite_active', 'active'])->nullable();
            $table->enum('training_duration', ['20_minutes', '30_minutes', '60_minutes'])->nullable();
            $table->enum('accessibility', ['no_equipment', 'with_equipment', 'both'])->nullable();
            $table->enum('dietary_preferences', ['none', 'vegan', 'gluten'])->nullable();
            $table->enum('dislike_food', ['none', 'chicken', 'fish', 'meat'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_users');
    }
};
