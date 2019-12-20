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
        $summoner->profileIconId = 14;
        $summoner->name = "Boca de Fossa";
        $summoner->puuid = "8fZtclFk8JnZdvzxnReFkQraLEmOT9b_T6jJNLzY4Zl00LDQulFqKJ2SU3r_Dz5bGHALTK8t2F1Sow";
        $summoner->summonerLevel = 140;
        $summoner->accountId = "mwAwq1lx_0yyOJ8JLEOKQgMZAkdzR_HUF7LpBM99PtjuYkI";
        $summoner->idapi = "TzFfMgC7gDTyxtAS-t-TL1Z91qw2TV9TtzHt7SkSrq4VQFo";
        $summoner->revisionDate = 1575737118000;
        $summoner->save();
    }
}
