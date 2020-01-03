<?php

use Illuminate\Database\Seeder;
use App\Match;
use App\Services\LolRequestService;

class MatchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lolService = new LolRequestService();

        $result = $lolService->getMatchs('mwAwq1lx_0yyOJ8JLEOKQgMZAkdzR_HUF7LpBM99PtjuYkI','0' , '15');

        $responseData = json_decode($result, true);

        foreach ($responseData['matches'] as $ma) {
            $match = new Match;
            $match->lane = $ma['lane'];
            $match->gameId = $ma['gameId'];
            $match->champion_id = $ma['champion'];
            $match->platformId = $ma['platformId'];
            $match->timestamp = $ma['timestamp'];
            $match->queue = $ma['queue'];
            $match->role = $ma['role'];
            $match->season = $ma['season'];
            $match->summoner_id = "TzFfMgC7gDTyxtAS-t-TL1Z91qw2TV9TtzHt7SkSrq4VQFo";
            $match->save();
        }
    }
}
