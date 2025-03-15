<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str; // Import Str untuk UUID

class CreateLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->uuid('id')->primary();  // UUID sebagai primary key
            $table->string('title');  // Kolom untuk judul landing page
            $table->text('description');  // Kolom untuk deskripsi landing page
            $table->string('thumbnail');  // Kolom untuk menyimpan path gambar thumbnail
            $table->string('target_url')->nullable();  // Kolom untuk URL target
            $table->string('code')->nullable();  // Kolom untuk menyimpan code (opsional)
            $table->string('slug')->unique();  // Kolom untuk slug (unique)
            $table->timestamps();  // Kolom untuk menyimpan waktu pembuatan dan pembaruan data
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_pages');
    }
}
