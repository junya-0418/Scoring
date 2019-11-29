<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'posts_id',
        'player_id',
        'evaluation',
    ];

}
