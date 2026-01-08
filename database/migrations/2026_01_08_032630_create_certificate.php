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
        Schema::create('certificate', function (Blueprint $table) {
            $table->id();

            // Student
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Program
            $table->foreignId('program_id')
                ->constrained('programs')
                ->cascadeOnDelete();

            // Content
            $table->string('file')->nullable();
            $table->text('description')->nullable();

            // Review
            $table->enum('status', ['submitted', 'opened'])
                ->default('submitted');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate');
    }
};
