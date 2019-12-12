<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Team;
use App\Match;
use App\Post;
use App\Mvp;
use App\Player;
use App\Evaluation;

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
            ->select(DB::raw('players.team_id, player_id, number, name, count(*) as player_count'))
            ->groupBy('player_id')
            ->get();

        return view('matchReview',
            compact('teams', 'match', 'mvp_outputs'));
    }

    public function getMatchReviewData($id) {

        $match = Match::find($id);
        $home_team_id = $match->home_team_id;
        $away_team_id = $match->away_team_id;

        //選手の評価の平均点
        $user_evaluation_outputs = DB::table('posts')
            ->join('evaluations', 'posts.id', '=', 'evaluations.posts_id')
            ->join('players', 'evaluations.player_id', '=', 'players.id')
            ->where('match_id', $match->id)
            ->select(DB::raw('players.team_id, number, name, player_id, AVG(evaluation) as player_evaluation_average'))
            ->groupBy('player_id')
            ->get();

        $home_team_evaluation_outputs = $user_evaluation_outputs->where('team_id', '=', $home_team_id)->sortBy('number');

        $away_team_evaluation_outputs = $user_evaluation_outputs->where('team_id', '=', $away_team_id)->sortBy('number');

        //ホームチームに投稿したユーザーとアウェイチームに投稿したユーザーを取ってくる
        $users = DB::table('posts')
            ->join('users', 'posts.user_id', 'users.id')
            ->where('match_id', $match->id)
            ->get();

        $home_team_users = $users->where('team_id', $home_team_id);
        $away_team_users = $users->where('team_id', $away_team_id);


        return response()->json(['home_team_evaluation_outputs' => $home_team_evaluation_outputs, 'away_team_evaluation_outputs' => $away_team_evaluation_outputs,
                                 'home_team_users' => $home_team_users, 'away_team_users' => $away_team_users]);

    }

    public function getPlayerComments(Request $request, $id) {

        $comments = DB::table('evaluations')
            ->join('posts', 'evaluations.posts_id', '=', 'posts.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('match_id', $request->match_id)
            ->where('player_id', $id)
            ->select(DB::raw('comment,name as user_name ,evaluation'))
            ->get();

        return $comments;

    }
}
