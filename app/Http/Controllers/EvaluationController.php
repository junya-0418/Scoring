<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Match;
use App\Player;

class EvaluationController extends Controller
{
    public function index() {

        $teams = Team::orderBy('created_at', 'desc')->get();
        $matches = Match::all();
        $players = Player::all();

        return view('evaluation_form',compact('teams', 'matches','players'));

    }

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
