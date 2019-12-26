<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {

            $table->bigInteger('gameId');
            $table->primary('gameId');

            $table->string('lane');
            $table->string('platformId');
            $table->bigInteger('timestamp');
            $table->integer('queue');
            $table->string('role');
            $table->integer('season');

            $table->string('champion_id');
            $table->foreign('champion_id')->references('id')->on('champions')->onDelete('cascade');

            $table->string('summoner_id');
            $table->foreign('summoner_id')->references('id')->on('summoners')->onDelete('cascade');

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
        Schema::dropIfExists('matches');
    }
}
