<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\Match;
use App\Player;
use App\User;
use App\Mvp;
use App\Post;
use App\Evaluation;

class EvaluationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {

        $teams = Team::orderBy('created_at', 'desc')->get();
        $matches = Match::all();
        $players = Player::all();

        return view('evaluation_form',compact('teams', 'matches','players'));

    }

    public function create(Request $request) {

        $match_id = Match::where('id',$request->match)->first()->id;
        $team_id = Team::where('name',$request->team)->first()->id;
        $user = Auth::user();

        $check = Post::where('match_id', $match_id)->where('user_id', $user->id)->get()->first();

        if ($check !== null) {
            return redirect('/evaluation/form')->withErrors('この試合には既に投稿済みです')->withInput();
        }

        if ($request->playersForEvaluation === null) {
            return redirect('/evaluation/form')->withErrors('採点を行ってから送信してください')->withInput();
        }

        Post::create([
            'team_id' => $team_id,
            'match_id' => $match_id,
            'user_id' => $user->id,
        ]);

        $posts_id = Post::where('team_id',$team_id)->where('match_id', $match_id)->where('user_id', $user->id)->first()->id;

        if ($request->mvp === 'noMVP') {

            $player_id = null;

        } else {
            $player_id = Player::where('id',$request->mvp)->first()->id;
            Mvp::create([
                'posts_id' => $posts_id,
                'player_id' => $player_id,
            ]);
        }

        for ($i=0; $i<count($request->playersForEvaluation); $i++) {

        Evaluation::create([
            'posts_id' => $posts_id,
            'player_id' => $request->playersForEvaluation[$i],
            'evaluation' => $request->evaluations[$i],
            'comment' => $request->comments[$i]
        ]);

        }

        return redirect('/');

    }
}
