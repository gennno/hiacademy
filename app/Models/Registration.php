<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /**
     * Table name
     * Laravel default plural already matches: registrations
     */
    protected $table = 'registration';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        // Student Info
        'name',
        'email',
        'phone',
        'birth_date',
        'gender',
        'address',

        // Program Info (snapshot)
        'program_name',
        'level',
        'class_type',
        'learning_mode',
        'status',

        // Admin flow
        'registration_status',
        'processed_at',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'birth_date'   => 'date',
        'processed_at' => 'datetime',
    ];

    /**
     * Query Scopes
     */
    public function scopeRegular($query)
    {
        return $query->where('status', 'regular');
    }

    public function scopeTrial($query)
    {
        return $query->where('status', 'trial');
    }

    public function scopeOnline($query)
    {
        return $query->where('learning_mode', 'online');
    }

    public function scopeOffline($query)
    {
        return $query->where('learning_mode', 'offline');
    }

    public function scopeNew($query)
    {
        return $query->where('registration_status', 'new');
    }

    public function scopeApproved($query)
    {
        return $query->where('registration_status', 'approved');
    }
}
