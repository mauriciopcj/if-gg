<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{

    protected $primaryKey = ['participantId','match_detail_id'];
    public $incrementing = false;

    protected $fillable = [
        'participantId',
        'match_detail_id',
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
    ];

    protected $table = 'participants';

    public function match()
    {
        return $this->belongsTo('App\MatchDetails',['participantId','match_detail_id']);
    }
}
