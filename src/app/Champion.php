<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'title',
        'img_screen',
        'img_square'
    ];

    public function matchs()
    {
        return $this->hasMany('App\Match','champion_id');
    }

    public function participants()
    {
        return $this->hasMany('App\Match','championId');
    }

    public function mastery()
    {
        return $this->hasMany('App\Mastery','championId');
    }

}
