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
        Schema::create('workout', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('difficulty', ['easy', 'medium', 'hard']);
            $table->enum('muscle_group', ['upper_body', 'lower_body']);
            $table->integer('duration');
            $table->integer('repitition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout');
    }
};
