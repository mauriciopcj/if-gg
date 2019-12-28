<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchDetail extends Model
{
    protected $primaryKey = 'gameId';
    public $incrementing = false;

    protected $fillable = [
        'gameId',
        'gameMode',
        'gameType',
        'gameDuration',
        'gameCreation'
    ];

    protected $table = 'match_details';

    public function match()
    {
        return $this->hasOne('App\Match','gameId');
    }

    public function participants()
    {
        return $this->hasMany('App\Participants','match_detail_id');
    }
    
}
