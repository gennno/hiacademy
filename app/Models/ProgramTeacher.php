<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramTeacher extends Model
{
    protected $table = 'program_teachers';

    protected $fillable = [
        'user_id',
        'program_id',
    ];

    /**
     * ======================
     * Relationships
     * ======================
     */

    // Teacher (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
