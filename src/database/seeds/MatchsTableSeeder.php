<?php

use Illuminate\Database\Seeder;
use App\Match;

class MatchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opts = array('https' =>
            array(
                'method'  => 'GET',
                'header'  => array(
                    "Origin" => "https://developer.riotgames.com",
                    "Accept-Charset" => "application/x-www-form-urlencoded; charset=UTF-8",
                    "X-Riot-Token" => "RGAPI-8fc2e434-3d9c-43af-a168-60046da9a41c",
                    "Accept-Language" => "pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3",
                    "User-Agent" => "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0")
            )
        );
        
        $context = stream_context_create($opts);
        
        $result = file_get_contents("https://br1.api.riotgames.com/lol/match/v4/matchlists/by-account/1mSmyj4J_Oi8yM6EtHxzGzImu8LuO97GAZ6UuTHi5EVp?endIndex=15&api_key=RGAPI-8fc2e434-3d9c-43af-a168-60046da9a41c", false, $context);
        
        $responseData = json_decode($result, true);

        foreach($responseData['matches'] as $ma){
            $match = new Match;
            $match->lane = $ma['lane'];
            $match->gameId = $ma['gameId'];
            $match->champion_id = $ma['champion'];
            $match->platformId = $ma['platformId'];
            $match->timestamp = $ma['timestamp'];
            $match->queue = $ma['queue'];
            $match->role = $ma['role'];
            $match->season = $ma['season'];
            $match->summoner_id = "t1zgW2FvDn95vE8C5w7HsVysqNUFAYTHzPypzLtZLXs1SA";
            $match->save();
        }
        
    }
}
