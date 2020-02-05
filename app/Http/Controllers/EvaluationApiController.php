<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Post;
use App\Team;
use App\Match;
use App\Player;
use App\User;
use App\Mvp;
use App\Evaluation;


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

    public function getMatchesforSearch() {

        $matches = DB::table('matches')
            ->leftjoin('stadiums', 'matches.stadium_id', '=', 'stadiums.id')
            ->select(DB::raw('matches.id as id, date, match_type, score, home_team_id, away_team_id, home_team_name, away_team_name, name'))
            ->get();

        return $matches;

    }

    public function getPlayerRanking() {

//        選手の評価の平均点
        $player_ranking = DB::table('posts')
            ->join('evaluations', 'posts.id', '=', 'evaluations.posts_id')
            ->join('players', 'evaluations.player_id', '=', 'players.id')
            ->join('matches', 'posts.match_id', '=', 'matches.id')
            ->where('match_type', 'FUJI XEROX SUPER CUP')
            ->select(DB::raw('players.team_id, number, name, player_id, AVG(evaluation) as player_evaluation_average'))
            ->groupBy('player_id')
            ->orderBy('player_evaluation_average', 'desc')
            ->take(5)
            ->get();

        return $player_ranking;

    }


}
