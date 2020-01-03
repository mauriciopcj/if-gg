<?php

use Illuminate\Database\Seeder;
use App\Champion;
use App\Services\LolRequestService;

class ChampionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lolService = new LolRequestService(true);
        $responseData = $lolService->getChampions();
        $version = $lolService->getLastVersion();
        foreach($responseData['data'] as $cha){
            $champion = new Champion;
            $champion->id = $cha['key'];
            $champion->name = $cha['name'];
            $champion->title = $cha['title'];
            $champion->img_screen = "http://ddragon.leagueoflegends.com/cdn/img/champion/loading/".$cha['name']."_0.jpg";
            $champion->img_square = "http://ddragon.leagueoflegends.com/cdn/$version/img/champion/".$cha['image']['full'];
            $champion->save();
        }
        
    }
}
