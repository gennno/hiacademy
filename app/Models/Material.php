<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'lesson_id',
        'type',
        'content',
        'order',
    ];

    /**
     * Relationships
     */

    // Material belongs to a Lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * Query Scopes
     */

    // Order materials properly
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Type helpers (optional but clean)
    public function scopeText($query)
    {
        return $query->where('type', 'text');
    }

    public function scopeImage($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeLink($query)
    {
        return $query->where('type', 'link');
    }

    public function scopePdf($query)
    {
        return $query->where('type', 'pdf');
    }
}
