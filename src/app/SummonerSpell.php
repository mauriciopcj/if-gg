<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummonerSpell extends Model
{
    protected $primaryKey = 'key';
    public $incrementing = false;
    
    protected $fillable = [
        'key',
        'name', 
        'description',
        'cooldownBurn',
        'image'
    ];

    public function participants()
    {
        return $this->hasMany('App\Participants','match_detail_id');
    }

}
