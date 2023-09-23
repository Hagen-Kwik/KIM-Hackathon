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
        Schema::create('learning_types', function (Blueprint $table) {
            $table->id();
            $table->enum('learning_type', ["Video pembelajaran","Modul pembelajaran", "Tugas"])->default("Video pembelajaran");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_types');
    }
};
