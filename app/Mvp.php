<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mvp extends Model
{
    protected $fillable = [
        'match_id',
        'player_id',
        'user_id',
        'comment'
    ];
}
