<?php

namespace App\Repositories\Match;

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

class MatchRepository implements MatchRepositoryInterface
{

    public function getAllTeams() {
        return Team::all();
   }

   //全試合データを取得
    public function getMatchesForSearch() {
        return DB::table('matches')
            ->leftjoin('teams as home_team', 'matches.home_team_id', '=', 'home_team.id')
            ->leftjoin('teams as away_team', 'matches.away_team_id', '=', 'away_team.id')
            ->leftjoin('stadiums', 'matches.stadium_id', '=', 'stadiums.id')
            ->select(DB::raw('matches.id as id, date, match_type, score, home_team.name as home_team_name, away_team.name as away_team_name, stadiums.name as stadium_name'))
            ->get();
    }

    //mvp数集計
    public function getMvpCountsThisMatch($match) {
        return DB::table('mvps')
            ->join('players', 'mvps.player_id', '=', 'players.id')
            ->join('posts', 'mvps.posts_id', '=', 'posts.id')
            ->where('match_id', $match->id)
            ->select(DB::raw('players.team_id, player_id, number, name, count(*) as player_count'))
            ->groupBy('player_id')
            ->get();
    }

    //選手の評価の平均点を取得
    public function getPlayerEvaluationAverage($match) {
        return DB::table('posts')
            ->join('evaluations', 'posts.id', '=', 'evaluations.posts_id')
            ->join('players', 'evaluations.player_id', '=', 'players.id')
            ->where('match_id', $match->id)
            ->select(DB::raw('players.team_id, number, name, player_id, AVG(evaluation) as player_evaluation_average'))
            ->groupBy('player_id')
            ->get();
    }

    //ホームチームとアウェイチームに対する投稿をとってくる
    public function getPosts($match) {
        return DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select(DB::raw('posts.id as id, match_id, user_id, team_id, name, title'))
            ->where('match_id', $match->id)
            ->get();
    }

    //プレーヤーごとのコメントを取得する
    public function getPlayerComments($match_id, $id) {
        return DB::table('evaluations')
            ->join('posts', 'evaluations.posts_id', '=', 'posts.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('match_id', $match_id)
            ->where('player_id', $id)
            ->select(DB::raw('comment,name as user_name ,evaluation'))
            ->get();
    }

    //フォームで選択されたチームの試合を取得する
    public function getMatchesForEvaluationForm($id) {
        return DB::table('matches')
            ->leftjoin('teams as home_team', 'matches.home_team_id', '=', 'home_team.id')
            ->leftjoin('teams as away_team', 'matches.away_team_id', '=', 'away_team.id')
            ->where('home_team.id', $id)
            ->orWhere('away_team.id', $id)
            ->select(DB::raw('matches.id as id, match_type, home_team.name as home_team_name, away_team.name as away_team_name'))
            ->get();
    }
}
