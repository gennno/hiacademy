<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;

    protected $table = 'receipts';

    protected $fillable = [
        'receipt_number',
        'receipt_date',
        'invoice_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'total_paid',
        'payment_reference',
        'note',
    ];

    protected $casts = [
        'receipt_date' => 'date',
        'total_paid'   => 'decimal:2',
    ];

    /**
     * Receipt belongs to an Invoice
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Receipt has many items
     */
    public function items()
    {
        return $this->hasMany(ReceiptItem::class);
    }
}
