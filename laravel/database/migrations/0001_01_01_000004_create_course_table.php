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
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->text('description');
            $table->text('image_path')->nullable();
            $table->timestamps();
        });

        // Pivot table for course professors
        Schema::create('course_professor', function (Blueprint $table) {
            $table->id();
            $table->uuid('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->uuid('professor_id');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
            $table->timestamps();
        });

        // Pivot table for course student assistants
        Schema::create('course_student_assistant', function (Blueprint $table) {
            $table->id();
            $table->uuid('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->uuid('student_assistant_id');
            $table->foreign('student_assistant_id')->references('id')->on('professors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student_assistant');
        Schema::dropIfExists('course_professor');
        Schema::dropIfExists('courses');
    }
};
