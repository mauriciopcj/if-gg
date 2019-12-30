<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummonerSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summoner_spells', function (Blueprint $table) {
            $table->integer('key');
            $table->string('name');
            $table->longText('description');
            $table->string('cooldownBurn');
            $table->string('image');
            $table->timestamps();

            $table->primary('key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summoner_spells');
    }
}
