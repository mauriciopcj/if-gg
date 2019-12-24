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
        $match = new Match;
        $match->accountId = "1mSmyj4J_Oi8yM6EtHxzGzImu8LuO97GAZ6UuTHi5EVp";
        $match->lane = "TOP";
        $match->gameId = 1803822534;
        $match->champion = 103;
        $match->platformId = "BR1";
        $match->timestamp = 1575232753440;
        $match->queue = 450;
        $match->role = "DUO_SUPPORT";
        $match->season = 13;
        $match->save();
    }
}
