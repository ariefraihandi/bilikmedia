<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_credits', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Use UUID as the primary key
            $table->uuid('user_id'); // Use UUID for the user ID as well
            $table->string('redeem_code')->unique();
            $table->string('token_1')->nullable();
            $table->string('token_2')->nullable();
            $table->string('token_3')->nullable();
            $table->string('token_4')->nullable();
            $table->string('token_5')->nullable();
            $table->boolean('is_redeemed')->default(false);
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
        Schema::dropIfExists('ad_credits');
    }
}
