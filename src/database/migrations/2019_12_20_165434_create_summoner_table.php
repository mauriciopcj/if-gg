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
            
            $table->string('id');
            $table->primary('id');

            $table->string('name');
            $table->string('puuid')->nullable($value = true);
            $table->bigInteger('summonerLevel')->nullable($value = true);
            $table->bigInteger('revisionDate')->nullable($value = true);
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
        Schema::dropIfExists('summoners');
    }
}
