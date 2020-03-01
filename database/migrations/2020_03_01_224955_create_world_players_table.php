<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->bigInteger('world_team_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('world_team_id')->references('id')->on('world_teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('world_players');
    }
}
