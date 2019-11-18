<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\Match;
use App\Player;
use App\User;
use App\Mvp;


class EvaluationApiController extends Controller
{
    public function getTeams() {

        $teams = Team::all();

        return $teams;

    }

    public function getMatches(Request $request) {

        $id = Team::where('name', $request->team)->first()->id;

        $matches = Match::where('home_team_id', $id)->orWhere('away_team_id', $id)->get();

        return $matches;
    }

    public function getPlayers(Request $request) {

        $id = Team::where('name', $request->team)->first()->id;

        $players = Player::where('team_id', $id)->orderBy('number', 'asc')->get();

        return $players;

    }

}
