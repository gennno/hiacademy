<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'lesson_id',
        'type',
        'file',
        'description',
        'status',
    ];

    /**
     * ======================
     * Relationships
     * ======================
     */

    // Student (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Lesson (nullable)
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * ======================
     * Query Scopes (optional but recommended)
     * ======================
     */

    // Lesson reports only
    public function scopeLesson($query)
    {
        return $query->where('type', 'lesson');
    }

    // Weekly reports only
    public function scopeWeekly($query)
    {
        return $query->where('type', 'weekly');
    }

    // Final reports only
    public function scopeFinal($query)
    {
        return $query->where('type', 'final');
    }

    // Submitted reports
    public function scopeSubmitted($query)
    {
        return $query->where('status', 'submitted');
    }

    // Opened reports
    public function scopeOpened($query)
    {
        return $query->where('status', 'opened');
    }
    public function items()
{
    return $this->hasMany(ReportItem::class)->orderBy('sort_order');
}
}