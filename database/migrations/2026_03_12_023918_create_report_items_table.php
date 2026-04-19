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
        Schema::create('report_items', function (Blueprint $table) {
            $table->id();

            // Parent report
            $table->foreignId('report_id')
                ->constrained('reports')
                ->cascadeOnDelete();

            // File attachment
            $table->string('file');

            // Optional caption / explanation
            $table->text('caption')->nullable();

            // Optional ordering
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_items');
    }
};
