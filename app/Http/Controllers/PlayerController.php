<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;

class PlayerController extends Controller
{
    public function create(Request $request) {

        $team_id = Team::where('name',$request->team)->first()->id;

        Player::create([
            'number' => $request->number,
            'team_id' => $team_id,
            'name' => $request->player,
        ]);

        return redirect('/players');

    }

    public function show() {

        $teams = Team::all();
        $players = Player::all();

        return view('players_lists', compact('players','teams'));

    }
}
