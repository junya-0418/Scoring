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
        Schema::create('mvp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('match_id')->unsigned();
            $table->biginteger('player_id')->unsigned();
            $table->biginteger('user_id')->unsigned();
            $table->string('comment');
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches');
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mvp');
    }
}
