<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'invoice_id',
        'program_name',
        'level',
        'category',
        'description',
        'amount',
        'discount_percent',
        'discount_amount',
        'amount_after_discount',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'amount' => 'decimal:2',
    ];

    /**
     * Relationships
     */

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
