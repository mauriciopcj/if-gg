<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_details', function (Blueprint $table) {

            $table->bigInteger('gameId');
            $table->primary('gameId');

            $table->string('gameMode');
            $table->string('gameType');
            $table->bigInteger('gameDuration');
            $table->bigInteger('gameCreation');

            $table->foreign('gameId')->references('gameId')->on('matches')->onDelete('cascade');

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
        Schema::dropIfExists('match_details');
    }
}
