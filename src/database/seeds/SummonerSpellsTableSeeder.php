<?php

use Illuminate\Database\Seeder;
use App\SummonerSpell;

class SummonerSpellsTableSeeder extends Seeder
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
        
        $result = file_get_contents("http://ddragon.leagueoflegends.com/cdn/9.24.2/data/pt_BR/summoner.json", false, $context);
        
        $responseData = json_decode($result, true);

        foreach($responseData['data'] as $sumSpell)
        {
            $spell = new SummonerSpell;
            $spell->key = $sumSpell['key'];
            $spell->name = $sumSpell['name'];
            $spell->description = $sumSpell['description'];
            $spell->image = "http://ddragon.leagueoflegends.com/cdn/9.24.2/img/spell/".$sumSpell['image']['full'];
            $spell->cooldownBurn = $sumSpell['cooldownBurn'];
            $spell->save();
        }
    }
}
