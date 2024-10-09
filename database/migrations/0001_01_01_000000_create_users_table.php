<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel Users
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID untuk primary key
            $table->string('username'); // Nama pengguna
            $table->string('email')->unique(); // Email harus unik
            $table->timestamp('email_verified_at')->nullable(); // Timestamp untuk verifikasi email
            $table->string('password');
            $table->tinyInteger('role')->default(1); // Default role
            $table->tinyInteger('status')->default(0); // Status 0 berarti belum diverifikasi
            $table->string('reffered_by')->nullable(); // Field opsional untuk reff
            $table->rememberToken(); // Token untuk "remember me"
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });

        // Tabel Password Reset Tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email pengguna yang akan reset password
            $table->string('token'); // Token reset password
            $table->timestamp('created_at')->nullable(); // Timestamp untuk token
        });

        // Tabel Sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key session ID
            $table->uuid('user_id')->nullable()->index(); // UUID user ID sebagai foreign key
            $table->string('ip_address', 45)->nullable(); // Alamat IP pengguna
            $table->text('user_agent')->nullable(); // Data user agent browser
            $table->longText('payload'); // Payload session
            $table->integer('last_activity')->index(); // Terakhir kali user aktif
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel-tabel ini jika migrasi di-revert
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
