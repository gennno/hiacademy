<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invoice_id')
                ->constrained('invoices')
                ->onDelete('cascade');

            // Item fields
            $table->string('program_name'); // ex: "English - Adventurer"
            $table->string('level');       // ex: "Teenagers"
            $table->string('category');    // ex: "English"
            $table->decimal('amount', 15, 2);    // 1200000

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
