<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{

    protected $primaryKey = ['participantId', 'match_detail_id'];
    public $incrementing = false;

    protected $fillable = [
        'participantId',
        'match_detail_id',
        'summonerName',
        'spell1Id',
        'lane',
        'spell2Id',
        'largestMultiKill',
        'kills',
        'assists',
        'deaths',
        'goldEarned',
        'champLevel',
        'championId',
        'win',
        'summonerId',
        'teamId',
        'item0',
        'item1',
        'item2',
        'item3',
        'item4',
        'item5',
        'item6',
    ];

    protected $table = 'participants';

    public function match()
    {
        return $this->belongsTo('App\MatchDetails',['participantId','match_detail_id']);
    }

    public function summoner()
    {
        return $this->belongsTo('App\Summoner',['participantId','match_detail_id']);
    }

    public function champion()
    {
        return $this->belongsTo('App\Champion','championId');
    }

    public function spellOne()
    {
        return $this->belongsTo('App\SummonerSpell','spell1Id');
    }

    public function spellTwo()
    {
        return $this->belongsTo('App\SummonerSpell','spell2Id');
    }

}
