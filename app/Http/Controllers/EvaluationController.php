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
}
