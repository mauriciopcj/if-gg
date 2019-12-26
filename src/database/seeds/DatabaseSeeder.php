<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SummonerTableSeeder::class);
        $this->call(ChampionTableSeeder::class);
        $this->call(MatchsTableSeeder::class);

    }
}
