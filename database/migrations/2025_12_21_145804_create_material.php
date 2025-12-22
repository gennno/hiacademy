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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lesson_id')
                ->constrained('lessons')
                ->cascadeOnDelete();

            $table->enum('type', ['text', 'image', 'link', 'pdf']);
            $table->text('content'); // text OR path OR URL

            $table->integer('order')->default(0);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
