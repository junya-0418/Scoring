<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Repositories\Match\MatchRepositoryInterface;

use App\Team;
use App\Match;
use App\Post;
use App\Mvp;
use App\Player;
use App\Evaluation;

class MatchReviewController extends Controller
{
    public function __construct(MatchRepositoryInterface $match_repository)
    {
        $this->match_repository = $match_repository;
    }

    //試合情報
    public function index($id) {

        $match = Match::findOrFail($id);

        //mvp数集計
        $mvp_outputs = $this->match_repository->getMvpCountsThisMatch($match);

        return view('matchReview', compact( 'match', 'mvp_outputs'));
    }

    //選手の採点を表示
    public function showMatchReviewData($id) {

        $match = Match::find($id);
        $home_team_id = $match->home_team_id;
        $away_team_id = $match->away_team_id;

        //選手の評価の平均点
        $user_evaluation_outputs = $this->match_repository->getPlayerEvaluationAverage($match);

        $home_team_evaluation_outputs = $user_evaluation_outputs->where('team_id', '=', $home_team_id)->sortBy('number');

        $away_team_evaluation_outputs = $user_evaluation_outputs->where('team_id', '=', $away_team_id)->sortBy('number');

        //ホームチームに投稿したユーザーとアウェイチームに投稿したユーザーを取ってくる
        $users = $this->match_repository->getPostsUsers($match);

        $home_team_users = $users->where('team_id', $home_team_id);
        $away_team_users = $users->where('team_id', $away_team_id);


        return response()->json(['home_team_evaluation_outputs' => $home_team_evaluation_outputs,
                                 'away_team_evaluation_outputs' => $away_team_evaluation_outputs,
                                 'home_team_users' => $home_team_users,
                                 'away_team_users' => $away_team_users]);

    }

    public function showPlayerComments(Request $request, $id) {

        $match_id = $request->match_id;

        $comments = $this->match_repository->getPlayerComments($match_id, $id);

        return $comments;

    }
}
