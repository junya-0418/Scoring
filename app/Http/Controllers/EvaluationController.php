<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\Match;
use App\Player;
use App\User;
use App\Mvp;

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

    public function mvp_create(Request $request) {

//        dd($request->team);
//        dd($request->match);
//        dd($request->player);
//        dd($request->comment);

        $match_id = Match::where('id',$request->match)->first()->id;
        $player_id = Player::where('id',$request->player)->first()->id;
        $user = Auth::user();

        Mvp::create([
            'match_id' => $match_id,
            'player_id' => $player_id,
            'user_id' => $user->id,
            'comment' => $request->comment,
        ]);

        return redirect('/home');

    }
}
