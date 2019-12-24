<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'accountId',
        'lane',
        'gameId',
        'champion',
        'platformId',
        'timestamp',
        'queue',
        'role',
        'season' 
    ];
}
