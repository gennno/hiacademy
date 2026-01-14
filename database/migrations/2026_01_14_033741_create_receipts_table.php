<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();

            // Receipt identity
            $table->string('receipt_number')->unique(); // RCPT20260001
            $table->date('receipt_date');

            // Relation to invoice
            $table->string('invoice_number');

            // Customer snapshot
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();
            $table->text('customer_address')->nullable();

            // Summary
            $table->decimal('total_paid', 15, 2);

            // Payment info
            $table->string('payment_reference')->nullable();  // Nomor Rekening
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
