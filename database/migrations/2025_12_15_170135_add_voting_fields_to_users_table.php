<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('id');
            $table->string('nama_lengkap')->after('username');
            $table->string('first_password')->after('password');
            $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('set null')->after('first_password');
            $table->enum('role', ['pemilih', 'admin'])->default('pemilih')->after('class_id');
            $table->boolean('has_voted')->default(false)->after('role');
            $table->dropColumn('name'); // hapus kolom name bawaan Laravel
            $table->dropColumn('email'); // hapus kolom name bawaan Laravel
            $table->dropColumn('email_verified_at'); // hapus kolom name bawaan Laravel
            $table->dropColumn('remember_token'); // hapus kolom name bawaan Laravel
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'nama_lengkap', 'first_password', 'class_id', 'role', 'has_voted']);
            $table->string('name')->after('id');
        });
    }
};