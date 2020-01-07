<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Match;

class Summoner extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name', 
        'puuid', 
        'summonerLevel', 
        'revisionDate',
        'accountId', 
        'profileIconId'  
    ];

    // public function matchs()
    // {
    //     return $this->hasMany('App\Match','summoner_id');
    // }

    public function participants()
    {
        return $this->hasMany('App\Participants','summonerId');
    }

    public function mastery()
    {
        return $this->hasMany('App\Mastery','summonerId');
    }
}
