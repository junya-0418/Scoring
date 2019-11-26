<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'team_id',
        'match_id',
        'user_id'
    ];
}
