<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID untuk primary key
            $table->string('user_id'); // UUID user_id sebagai foreign key ke tabel users
            $table->string('name'); // Nama pengguna
            $table->string('phone'); // Nomor telepon pengguna
            $table->string('kredit')->nullable(); // Kredit pengguna (opsional)
            $table->timestamps(); // Timestamp untuk created_at dan updated_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
