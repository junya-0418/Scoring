<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;
use App\Match;

class MatchReviewController extends Controller
{
    public function index($id) {

        $teams = Team::all();

        $match = Match::find($id);

        return view('matchReview',compact('teams', 'match'));

    }
}
