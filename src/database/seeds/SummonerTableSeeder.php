<?php

use App\Services\LolRequestService;
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
        $lolService = new LolRequestService();
        $responseData = json_decode($lolService->getSummonerByName('Boca%20de%20Fossa'), true);
        
        $summoner = new Summoner;
        $summoner->profileIconId = (int) $responseData['profileIconId'];
        $summoner->name = $responseData['name'];
        $summoner->puuid = $responseData['puuid'];
        $summoner->summonerLevel = (int) $responseData['summonerLevel'];
        $summoner->accountId = $responseData['accountId'];
        $summoner->id = $responseData['id'];
        $summoner->revisionDate = (int) $responseData['revisionDate'];
        $summoner->save();
    }
}
