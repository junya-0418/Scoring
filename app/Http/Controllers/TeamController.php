<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;
use App\Post;
use App\User;
use App\Player;

class TeamController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

//    public function create(Request $request) {
//
//        Team::create(['name' => $request->name]);
//
//        return redirect('/');
//
//    }

    public function index($id) {

        $team = Team::findOrFail($id);

        $supporters_count = User::where('support_team_id', $id)->get()->count();

        $players = Player::where('team_id', $team->id)
            ->orderBy('number', 'asc')
            ->get();

        $posts = DB::table('posts')
            ->join('matches', 'posts.match_id', '=', 'matches.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('team_id', $id)
            ->select(DB::raw('posts.id, match_type, home_team_name,away_team_name, score, posts.created_at as posts_created_at, name'))
            ->orderBy('posts_created_at', 'desc')
            ->get();

        return view('team_index', compact('team', 'supporters_count','players', 'posts'));

    }
}
