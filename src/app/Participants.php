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

    public function item_0()
    {
        return $this->belongsTo('App\Iten','item0');
    }

    public function item_1()
    {
        return $this->belongsTo('App\Iten','item1');
    }

    public function item_2()
    {
        return $this->belongsTo('App\Iten','item2');
    }

    public function item_3()
    {
        return $this->belongsTo('App\Iten','item3');
    }

    public function item_4()
    {
        return $this->belongsTo('App\Iten','item4');
    }

    public function item_5()
    {
        return $this->belongsTo('App\Iten','item5');
    }

    public function item_6()
    {
        return $this->belongsTo('App\Iten','item6');
    }
}
