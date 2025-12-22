<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'profile_photo',
        'birth_date',
        'gender',
    ];

    /**
     * Hidden attributes for serialization
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date',
        'password' => 'hashed',
    ];

    /**
     * Automatically hash password when setting
     */
    public function setPasswordAttribute($value): void
    {
        if (! empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * Accessor for profile photo URL
     */
    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }

        return asset('img/default-avatar.png');
    }

    /**
     * Role helpers
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    public function isStaff(): bool
    {
        return $this->role === 'staff';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    /**
     * Example future relationships
     */

    // A student can enroll in many classes
    // public function enrollments()
    // {
    //     return $this->hasMany(Enrollment::class);
    // }

    // A teacher can teach many classes
    // public function teachingClasses()
    // {
    //     return $this->hasMany(ProgramClass::class, 'teacher_id');
    // }

    public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}

public function programs()
{
    return $this->belongsToMany(Program::class, 'enrollments')
                ->withPivot(['status', 'enrolled_at', 'completed_at'])
                ->withTimestamps();
}

public function teachingPrograms()
{
    return $this->belongsToMany(Program::class, 'program_teachers')
                ->withTimestamps();
}
public function reports()
{
    return $this->hasMany(Report::class);
}

}
