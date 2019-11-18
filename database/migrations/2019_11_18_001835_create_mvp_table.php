<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMvpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mvps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('posts_id')->unsigned();
            $table->bigInteger('player_id')->unsigned();
            $table->timestamps();

            $table->foreign('posts_id')->references('id')->on('posts');
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mvps');
    }
}
