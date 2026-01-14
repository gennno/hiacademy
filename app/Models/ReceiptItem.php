<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiptItem extends Model
{
    use HasFactory;

    protected $table = 'receipt_items';

    protected $fillable = [
        'receipt_id',
        'program_name',
        'level',
        'category',
        'description',
        'paid_amount',
    ];

    protected $casts = [
        'paid_amount' => 'decimal:2',
    ];

    /**
     * Item belongs to a Receipt
     */
    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }
}
