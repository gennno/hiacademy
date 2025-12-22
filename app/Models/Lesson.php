<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'program_id',
        'title',
        'description',
        'order',
    ];

    /**
     * Relationships
     */

    // Lesson belongs to a Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Lesson has many Materials
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    // Lesson has many Tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Lesson has many Reports (lesson reports)
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Query Scopes
     */

    // Order lessons properly
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
    
}
