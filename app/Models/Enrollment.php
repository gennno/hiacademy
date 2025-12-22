<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Enrollment extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'status',
        'enrolled_at',
        'completed_at',
    ];

    protected $casts = [
        'enrolled_at'  => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * ======================
     * Relationships
     * ======================
     */

    // Student
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * ======================
     * Query Scopes
     * ======================
     */

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted(Builder $query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeCancelled(Builder $query)
    {
        return $query->where('status', 'cancelled');
    }

    /**
     * ======================
     * Helpers
     * ======================
     */

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }
}
