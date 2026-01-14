<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'invoice_number',
        'invoice_date',

        'registration_id',

        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',

        'subtotal',
        'discount',
        'grand_total',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'invoice_date' => 'date',
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'grand_total' => 'decimal:2',
    ];

    /**
     * Relationships
     */

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    /**
     * Query Scopes (optional but useful)
     */

    public function scopeByYear($query, $year)
    {
        return $query->whereYear('invoice_date', $year);
    }

    public function scopeByMonth($query, $month)
    {
        return $query->whereMonth('invoice_date', $month);
    }
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function receipts()
{
    return $this->hasMany(Receipt::class);
}


}
