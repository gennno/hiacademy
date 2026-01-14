<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {

            $table->decimal('discount_percent', 5, 2)
                ->default(0)
                ->after('amount');

            $table->decimal('discount_amount', 15, 2)
                ->default(0)
                ->after('discount_percent');

            $table->decimal('amount_after_discount', 15, 2)
                ->after('discount_amount');
        });
    }

    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn([
                'discount_percent',
                'discount_amount',
                'amount_after_discount',
            ]);
        });
    }
};