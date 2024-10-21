<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadsFreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads_free', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('product_id');
            $table->string('token_satu');
            $table->string('token_dua');
            $table->string('token_tiga');
            $table->string('token_empat');
            $table->string('token_lima');
            $table->string('token_enam');
            $table->string('token_tujuh');
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
        Schema::dropIfExists('downloads_free');
    }
}
