<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'program_name',
        'academic_year',
        'completion_date',
        'file',
        'description',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'completion_date' => 'date',
    ];

    /* ======================
        RELATIONSHIPS
    ======================= */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* ======================
        ACCESSORS (OPTIONAL)
    ======================= */

    // Formatted date for certificate display
    public function getFormattedCompletionDateAttribute()
    {
        return $this->completion_date
            ? $this->completion_date->format('F d, Y')
            : null;
    }
}
