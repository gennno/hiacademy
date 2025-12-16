<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'level',
        'category',
        'slug',
        'image',
        'slogan',
        'description',
    ];

    /**
     * Automatically generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->name);
            }
        });
    }

    /**
     * Accessor for program image URL
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset($this->image);
        }

        return asset('img/english.webp');
    }

    /**
     * Example relationship (future use)
     * A program has many classes
     */
    // public function classes()
    // {
    //     return $this->hasMany(ProgramClass::class);
    // }
}
