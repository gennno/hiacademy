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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            
            /** Account */
            $table->string('email');
            $table->string('name');
            $table->string('phone')->after('name');
            $table->text('address')->after('phone');
            $table->date('birth_date')->after('address');
            $table->enum('gender', ['male', 'female'])->after('birth_date');
            
            /** Enrollment */
            $table->string('category');
            $table->foreignId('program_id')->nullable()->constrained('programs')->onDelete('set null');
            $table->string('program_name');
            $table->enum('status', ['regular', 'trial'])->default('regular');
            $table->enum('learning_mode', ['offline', 'online'])->default('online');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
