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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            // Student
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Program
            $table->foreignId('program_id')
                ->constrained('programs')
                ->cascadeOnDelete();

            // Lesson (nullable)
            $table->foreignId('lesson_id')
                ->nullable()
                ->constrained('lessons')
                ->nullOnDelete();

            // Report classification
            $table->enum('type', ['lesson', 'weekly', 'monthly', 'final']);

            // Content
            $table->string('file')->nullable();
            $table->text('description')->nullable();

            // Review
            $table->enum('status', ['submitted', 'opened'])
                ->default('submitted');

            $table->timestamps();

            // Constraints
            $table->unique(['user_id', 'lesson_id'], 'unique_lesson_report');
            $table->unique(['user_id', 'program_id', 'type'], 'unique_program_report');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
