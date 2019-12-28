<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'goldBase',
        'goldTotal'
    ];

    public function participants()
    {
        return $this->hasMany('App\Participants', 'id');
    }
}
