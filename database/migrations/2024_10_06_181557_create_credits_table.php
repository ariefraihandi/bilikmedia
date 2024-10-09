<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->uuid('uuid')->primary(); // UUID sebagai primary key
            $table->string('user_id'); // User ID tanpa foreign key constraint
            $table->integer('credit_amount'); // Jumlah kredit (bisa positif atau negatif)
            $table->string('credit_type'); // Jenis kredit (e.g., 'daily', 'watch_ad', 'invite', 'share_link')
            $table->boolean('is_expires')->default(false); // Apakah kredit ini akan expired
            $table->timestamp('expires_at')->nullable(); // Waktu kedaluwarsa jika berlaku
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
