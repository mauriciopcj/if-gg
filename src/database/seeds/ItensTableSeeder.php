<?php

use Illuminate\Database\Seeder;
use App\Iten;
use App\Services\LolRequestService;

class ItensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lolService = new LolRequestService(true);
        $responseData = $lolService->getItems();
        $version = $lolService->getLastVersion();
        foreach($responseData['data'] as $key => $it)
        {
            $iten = new Iten;
            $iten->id = $key;
            $iten->name = $it['name'];
            $iten->description = $it['description'];
            $iten->image = "http://ddragon.leagueoflegends.com/cdn/$version/img/item/".$it['image']['full'];
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
