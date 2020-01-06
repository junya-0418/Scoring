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

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function like_by()
    {
        return Like::where('user_id', Auth::user()->id)->first();
    }

}
