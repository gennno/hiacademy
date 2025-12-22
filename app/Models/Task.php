<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'lesson_id',
        'type',
        'content',
    ];

    /**
     * Relationships
     */

    // Task belongs to a Lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * Type helpers (optional but very useful)
     */
    public function isText()
    {
        return $this->type === 'text';
    }

    public function isImage()
    {
        return $this->type === 'image';
    }

    public function isLink()
    {
        return $this->type === 'link';
    }

    public function isPdf()
    {
        return $this->type === 'pdf';
    }
}
