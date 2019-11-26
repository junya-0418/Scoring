<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Team;
use App\Match;
use App\Post;
use App\Mvp;
use App\Player;

class MatchReviewController extends Controller
{

    public function index($id) {

        $teams = Team::all();
        $match = Match::find($id);

        //mvp数集計
        $mvp_outputs = DB::table('mvps')
            ->join('players', 'mvps.player_id', '=', 'players.id')
            ->join('posts', 'mvps.posts_id', '=', 'posts.id')
            ->where('match_id', $match->id)
            ->select(DB::raw('number, name, count(*) as player_count'))
            ->groupBy('name')
            ->get();

        $user_evaluation_outputs = DB::table('posts')
            ->join('evaluations', 'posts.id', '=', 'evaluations.posts_id')
            ->join('players', 'evaluations.player_id', '=', 'players.id')
            ->where('match_id', $match->id)
            ->get();

//        dd($user_evaluation_outputs);

        return view('matchReview',compact('teams', 'match', 'mvp_outputs', 'user_evaluation_outputs'));

    }
}
