<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportItem extends Model
{
    protected $fillable = [
        'report_id',
        'file',
        'caption',
        'sort_order',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
