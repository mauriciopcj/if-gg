<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $primaryKey = 'gameId';
    public $incrementing = false;

    protected $fillable = [
        'gameId',
        'lane',
        'champion_id',
        'platformId',
        'timestamp',
        'queue',
        'role',
        'season',
        'summoner_id'
    ];

    protected $table = 'matches';

    public function summoner()
    {
        return $this->belongsTo('App\Summoner','summoner_id');
    }

    public function champion()
    {
        return $this->belongsTo('App\Champion','champion_id');
    }

    public function details()
    {
        return $this->belongsTo('App\MatchDetails','gameId');
    }
}
