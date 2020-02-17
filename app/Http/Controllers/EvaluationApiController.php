<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Repositories\Match\MatchRepositoryInterface;

use App\Post;
use App\Team;
use App\Match;
use App\Player;
use App\User;
use App\Mvp;
use App\Evaluation;


class EvaluationApiController extends Controller
{

    public function __construct(MatchRepositoryInterface $match_repository)
    {
        $this->match_repository = $match_repository;
    }


    public function getTeams() {

        $teams = Team::all();

        return $teams;

    }

    public function showMatches(Request $request) {

        $id = Team::where('name', $request->team)->first()->id;

        $matches = $this->match_repository->getMatchesForEvaluationForm($id);

        return $matches;
    }

    public function showPlayers(Request $request) {

        $id = Team::where('name', $request->team)->first()->id;

        $players = Player::where('team_id', $id)->orderBy('number', 'asc')->get();

        return $players;

    }
}
