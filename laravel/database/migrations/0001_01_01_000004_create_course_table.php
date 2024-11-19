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
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->text('image_path')->nullable();
            $table->text('code');
            $table->timestamps();
        });

        // Pivot table for course professors
        Schema::create('course_professor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('professor_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['course_id', 'professor_id']);
        });

        // Pivot table for course student assistants
        Schema::create('course_student_assistant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_assistant_id')->constrained('professors')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['course_id', 'student_assistant_id']);
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
