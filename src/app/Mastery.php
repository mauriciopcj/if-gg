<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mastery extends Model
{
    protected $primaryKey = ['summonerId', 'championId'];
    public $incrementing = false;

    protected $fillable = [
        'championLevel',
        'chestGranted',
        'championPoints',
        'championPointsSinceLastLevel',
        'championPointsUntilNextLevel',
        'summonerId',
        'tokensEarned',
        'championId',
        'lastPlayTime'
    ]

    public function champion()
    {
        return $this->belongsTo('App\Champion','championId');
    }

    public function summoner()
    {
        return $this->belongsTo('App\Summoner','summonerId');
    }
}
