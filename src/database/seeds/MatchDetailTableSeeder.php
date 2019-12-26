<?php

use Illuminate\Database\Seeder;
use App\MatchDetail;
use App\Match;

class MatchDetailTableSeeder extends Seeder
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
        
        $matches = Match::all();
        
        foreach($matches as $mat){
            $result = file_get_contents("https://br1.api.riotgames.com/lol/match/v4/matches/".$mat->gameId."?api_key=RGAPI-8fc2e434-3d9c-43af-a168-60046da9a41c", false, $context);
        
            $responseData = json_decode($result, true);
            $detail = new MatchDetail;
            $detail->gameId = $responseData['gameId'];
            $detail->gameMode = $responseData['gameMode'];
            $detail->gameType = $responseData['gameType'];
            $detail->gameDuration = $responseData['gameDuration'];
            $detail->gameCreation = $responseData['gameCreation'];
            $detail->save();
        }
        
    }
}
