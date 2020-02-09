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
            ->leftjoin('matches', 'posts.match_id', '=', 'matches.id')
            ->leftjoin('users', 'posts.user_id', '=', 'users.id')
            ->leftjoin('teams as home_team', 'matches.home_team_id', '=', 'home_team.id')
            ->leftjoin('teams as away_team', 'matches.away_team_id', '=', 'away_team.id')
            ->where('team_id', $id)
            ->select(DB::raw('posts.id, match_type, home_team.name as home_team_name, away_team.name as away_team_name, score, posts.created_at as posts_created_at, users.name as user_name'))
            ->orderBy('posts_created_at', 'desc')
            ->get();

        return view('team_index', compact('team', 'supporters_count','players', 'posts'));

    }
}
