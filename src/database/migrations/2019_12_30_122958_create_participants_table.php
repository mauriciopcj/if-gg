<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {

            $table->integer('participantId');
            $table->bigInteger('match_detail_id');
            
            $table->integer('spell1Id');
            $table->string('lane');
            $table->integer('spell2Id');
            $table->integer('largestMultiKill');
            $table->integer('kills');
            $table->integer('assists');
            $table->integer('deaths');
            $table->integer('goldEarned');
            $table->integer('champLevel');
            $table->string('championId');
            $table->integer('teamId');
            $table->string('summonerName');
            $table->boolean('win');
            $table->integer('item0');
            $table->integer('item1');
            $table->integer('item2');
            $table->integer('item3');
            $table->integer('item4');
            $table->integer('item5');
            $table->integer('item6');
            
            $table->foreign('championId')->references('id')->on('champions')->onDelete('cascade');
            
            $table->foreign('item0')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('item1')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('item2')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('item3')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('item4')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('item5')->references('id')->on('itens')->onDelete('cascade');
            $table->foreign('item6')->references('id')->on('itens')->onDelete('cascade');
           
            $table->foreign('spell1Id')->references('key')->on('summoner_spells')->onDelete('cascade');
            $table->foreign('spell2Id')->references('key')->on('summoner_spells')->onDelete('cascade');

            $table->primary(['participantId','match_detail_id']);
            $table->foreign('match_detail_id')->references('gameId')->on('match_details')->onDelete('cascade');

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
        Schema::dropIfExists('participants');
    }
}
