<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
      'number',
      'team_id',
      'name'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
