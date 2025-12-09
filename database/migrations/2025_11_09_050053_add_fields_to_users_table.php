<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['student','teacher','admin', 'superadmin'])
                ->default('student')
                ->after('password');
            $table->string('phone')->nullable()->after('role');
            $table->text('address')->nullable()->after('phone');
            $table->string('profile_photo')->nullable()->after('address');
            $table->date('birth_date')->nullable()->after('profile_photo');
            $table->enum('gender', ['male', 'female'])->nullable()->after('birth_date');
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'phone',
                'address',
                'profile_photo',
                'birth_date',
                'gender'
            ]);
        });
    }
};
