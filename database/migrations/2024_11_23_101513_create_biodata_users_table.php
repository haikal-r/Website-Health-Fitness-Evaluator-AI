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
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->decimal('bmi')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('experience_level', ['beginner', 'moderate', 'expert'])->nullable();
            $table->enum('activity_level', ['not_active', 'quite_active', 'active'])->nullable();
            $table->enum('training_duration', ['20_minute', '30_minute', '60_minute'])->nullable();
            $table->enum('accessibility', ['no_equipment', 'with_equipment', 'both'])->nullable();
            $table->enum('dietary_preferences', ['none', 'vegan', 'gluten', 'pescatarian', 'vegetarian'])->nullable();
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
