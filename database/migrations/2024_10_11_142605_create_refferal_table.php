<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefferalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refferal', function (Blueprint $table) {
            $table->uuid('uuid')->primary();  // UUID sebagai primary key
            $table->uuid('user_id');  // Mengubah user_id menjadi UUID jika primary key di users adalah UUID
            $table->string('refferal_code', 50);  // Kolom referral_code
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refferal');  // Drop tabel jika rollback
    }
}
