<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            // STUDENT
            [
                'name' => 'Student User',
                'username' => 'usr01',
                'email' => 'student@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'phone' => '081234567890',
                'address' => 'Jl. Pelajar No.1',
                'profile_photo' => null,
                'birth_date' => '2008-05-12',
                'gender' => 'male',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // TEACHER
            [
                'name' => 'Teacher User',
                'username' => 'tch01',
                'email' => 'teacher@example.com',
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'phone' => '081234567891',
                'address' => 'Jl. Guru No.2',
                'profile_photo' => null,
                'birth_date' => '1990-03-10',
                'gender' => 'female',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ADMIN
            [
                'name' => 'Staff User',
                'username' => 'stf01',
                'email' => 'staff@example.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'phone' => '081234567892',
                'address' => 'Jl. Staff No.3',
                'profile_photo' => null,
                'birth_date' => '1985-11-20',
                'gender' => 'male',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // SUPERADMIN
            [
                'name' => 'Admin',
                'username' => 'adm01',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '081234567893',
                'address' => 'Jl. Super No.4',
                'profile_photo' => null,
                'birth_date' => '1980-01-15',
                'gender' => 'female',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
