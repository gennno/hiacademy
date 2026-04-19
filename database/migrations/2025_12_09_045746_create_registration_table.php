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

            /** STUDENT INFO */
            $table->string('name');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('address')->nullable();

            /** PROGRAM INFO */
            $table->string('program_name');
            $table->string('level')->nullable();
            $table->string('class_type')->nullable();
            $table->enum('learning_mode', ['online', 'offline'])->default('online');
            $table->enum('status', ['regular', 'trial'])->default('regular');

            /** ADMIN FLOW */
            $table->enum('registration_status', [
                'new',
                'contacted',
                'approved',
                'rejected'
            ])->default('new');

            $table->timestamp('processed_at')->nullable();
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
