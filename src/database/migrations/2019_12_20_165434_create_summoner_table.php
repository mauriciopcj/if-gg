<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummonerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summoners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('puuid');
            $table->bigInteger('summonerLevel');
            $table->bigInteger('revisionDate');
            $table->string('idapi');
            $table->string('accountId');
            $table->integer('profileIconId');
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
        Schema::dropIfExists('Summoner');
    }
}
