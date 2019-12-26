<?php

use Illuminate\Database\Seeder;
use App\Summoner;

class SummonerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $summoner = new Summoner;
        $summoner->profileIconId = 658;
        $summoner->name = "Lanolder";
        $summoner->puuid = "T_Y_ciC88rpuQSwLRH-IfKe1u-zKU5LWmnkGQqscgIfQhCkf4xb0K7OaYMuzwMtdeJX6LLzbGYBcvA";
        $summoner->summonerLevel = 64;
        $summoner->accountId = "1mSmyj4J_Oi8yM6EtHxzGzImu8LuO97GAZ6UuTHi5EVp";
        $summoner->id = "t1zgW2FvDn95vE8C5w7HsVysqNUFAYTHzPypzLtZLXs1SA";
        $summoner->revisionDate = 1575205563000;
        $summoner->save();
    }
}
