<?php

use App\Services\LolRequestService;
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
        $lolService = new LolRequestService(true);
        $responseData = $lolService->getSpells();
        $version = $lolService->getLastVersion();

        foreach ($responseData['data'] as $sumSpell) {
            $spell = new SummonerSpell;
            $spell->key = $sumSpell['key'];
            $spell->name = $sumSpell['name'];
            $spell->description = $sumSpell['description'];
            $spell->image = "http://ddragon.leagueoflegends.com/cdn/$version/img/spell/" . $sumSpell['image']['full'];
            $spell->cooldownBurn = $sumSpell['cooldownBurn'];
            $spell->save();
        }
    }
}
