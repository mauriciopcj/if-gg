<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masteries', function (Blueprint $table) {

            $table->integer('championLevel');
            $table->boolean('chestGranted');
            $table->integer('championPoints');
            $table->bigInteger('championPointsSinceLastLevel');
            $table->bigInteger('championPointsUntilNextLevel');
            $table->string('summonerId');
            $table->integer('tokensEarned');
            $table->string('championId');
            $table->bigInteger('lastPlayTime');
            
            $table->timestamps();

            $table->primary([ 'summonerId', 'championId' ]);

            $table->foreign('summonerId')->references('id')->on('summoners')->onDelete('cascade');
            $table->foreign('championId')->references('id')->on('champions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mastery');
    }
}
