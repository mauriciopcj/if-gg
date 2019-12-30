<?php

use Illuminate\Database\Seeder;
use App\MatchDetail;
use App\Match;
use App\Participants;

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
                    "X-Riot-Token" => "RGAPI-12502b6d-9ae7-4830-ac12-d2b4fdc26db9",
                    "Accept-Language" => "pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3",
                    "User-Agent" => "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0")
            )
        );
        
        $context = stream_context_create($opts);
        
        $matches = Match::all();
        
        foreach($matches as $mat)
        {
            $result = file_get_contents("https://br1.api.riotgames.com/lol/match/v4/matches/".$mat->gameId."?api_key=RGAPI-12502b6d-9ae7-4830-ac12-d2b4fdc26db9", false, $context);
        
            $responseData = json_decode($result, true);
            $detail = new MatchDetail;
            $detail->gameId = $responseData['gameId'];
            $detail->gameMode = $responseData['gameMode'];
            $detail->gameType = $responseData['gameType'];
            $detail->gameDuration = $responseData['gameDuration'];
            $detail->gameCreation = $responseData['gameCreation'];
            $detail->save();

            foreach($responseData['participants'] as $part)
            {
                $participant = new Participants;
                $participant->participantId = $part['participantId'];
                $participant->match_detail_id = $responseData['gameId'];
                $participant->spell1Id = $part['spell1Id'];
                $participant->lane = $part['timeline']['lane'];
                $participant->spell2Id = $part['spell2Id'];
                $participant->largestMultiKill = $part['stats']['largestMultiKill'];
                $participant->kills = $part['stats']['kills'];
                $participant->assists = $part['stats']['assists'];
                $participant->deaths = $part['stats']['deaths'];
                $participant->goldEarned = $part['stats']['goldEarned'];
                $participant->champLevel = $part['stats']['champLevel'];
                $participant->championId = $part['championId'];
                $participant->teamId = $part['teamId'];
                foreach($responseData['participantIdentities'] as $sumId)
                {
                    if($sumId['participantId'] == $part['participantId'])
                    {
                        $participant->summonerName = $sumId['player']['summonerName'];
                    }
                }
                $participant->win = $part['stats']['win'];
                $participant->item0 = $part['stats']['item0'];
                $participant->item1 = $part['stats']['item1'];
                $participant->item2 = $part['stats']['item2'];
                $participant->item3 = $part['stats']['item3'];
                $participant->item4 = $part['stats']['item4'];
                $participant->item5 = $part['stats']['item5'];
                $participant->item6 = $part['stats']['item6'];
                $participant->save();
            }
        }
        
    }
}
