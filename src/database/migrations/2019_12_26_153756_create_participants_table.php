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
            $table->integer('championId');

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
