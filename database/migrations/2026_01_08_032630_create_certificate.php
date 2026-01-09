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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();

            // Student
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('name');

            // Program
            $table->string('program_name');

            // Academic info
            $table->string('academic_year');          // e.g. 2026 - 2027
            $table->date('completion_date');          // e.g. 2026-06-12

            // Content
            $table->string('file')->nullable();
            $table->text('description')->nullable();

            // Status
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
        Schema::dropIfExists('certificates');
    }
};
