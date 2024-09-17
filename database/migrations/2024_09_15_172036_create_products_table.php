<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->json('features')->nullable();
            $table->json('tags')->nullable();
            $table->string('types')->nullable();
            $table->string('additions')->nullable();
            $table->string('author')->nullable();
            $table->string('author_url')->nullable();
            $table->string('url_source')->nullable();
            $table->json('category')->nullable(); // Kolom JSON untuk menyimpan kategori
            $table->string('image')->nullable();
            $table->string('url_download')->nullable(); // Kolom baru untuk URL download
            $table->string('live_preview_url')->nullable(); // Kolom untuk live preview URL
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
        Schema::dropIfExists('products');
    }
}
