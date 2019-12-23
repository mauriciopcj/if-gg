<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summoner extends Model
{
    protected $fillable = [
        'name', 
        'puuid', 
        'summonerLevel', 
        'revisionDate', 
        'idapi', 
        'accountId', 
        'profileIconId'  
    ];
}
