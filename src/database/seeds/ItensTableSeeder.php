<?php

use Illuminate\Database\Seeder;
use App\Iten;

class ItensTableSeeder extends Seeder
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
                    "X-Riot-Token" => "RGAPI-e81166c2-070a-41b2-9421-60618dd6404e",
                    "Accept-Language" => "pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3",
                    "User-Agent" => "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0")
            )
        );
        
        $context = stream_context_create($opts);
        
        $result = file_get_contents("http://ddragon.leagueoflegends.com/cdn/9.24.2/data/pt_BR/item.json", false, $context);
        
        $responseData = json_decode($result, true);

        foreach($responseData['data'] as $key => $it)
        {
            $iten = new Iten;
            $iten->id = $key;
            $iten->name = $it['name'];
            $iten->description = $it['description'];
            $iten->image = $it['image']['full'];
            $iten->goldBase = $it['gold']['base'];
            $iten->goldTotal = $it['gold']['total'];
            $iten->save();
        }
        
        // item nulo para quando o slot do item estiver vazio
        $iten = new Iten;
        $iten->id = 0;
        $iten->name = '';
        $iten->description = '';
        $iten->image = '';
        $iten->goldBase = 0;
        $iten->goldTotal = 0;
        $iten->save();
    }
}
