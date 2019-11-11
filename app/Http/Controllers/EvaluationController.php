<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Match;

class EvaluationController extends Controller
{
    public function index() {

        $teams = Team::orderBy('created_at', 'desc')->get();
        return view('evaluation_form',compact('teams'));

    }
}
