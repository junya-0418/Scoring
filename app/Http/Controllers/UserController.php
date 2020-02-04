<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Team;
use App\User;
use App\Post;
use App\Evaluation;
use App\Checkin;

class UserController extends Controller
{
    public function index($id) {

        $teams = Team::all();

        $user = User::where('id', $id)->get()->first();

        $user_support_team = Team::where('id', $user->support_team_id)->get()->first();

        return view('user_index', compact('teams', 'user', 'user_support_team'));

    }

    public function getUserForIndex($id) {

        $user = User::where('id', $id)->get()->first();

        return $user;

    }

    public function forUserPost($id) {

        $user = User::where('id', $id)->get()->first();

        $posts = DB::table('posts')
            ->select('posts.id as posts_id', 'team_id', 'match_id', 'user_id', 'match_type', 'home_team_id', 'away_team_id', 'score', 'home_team_name', 'away_team_name', 'posts.created_at as posts_created')
            ->join('matches', 'posts.match_id', '=', 'matches.id')
            ->where('user_id', $user->id)
            ->orderBy('posts_created','desc')
            ->get();

        return $posts;

    }

    public function forUserCheckin($id) {

        $user = User::where('id', $id)->get()->first();

        $checkins = DB::table('checkins')
            ->select('checkins.id as checkins_id', 'match_id', 'user_id', 'match_type', 'home_team_id', 'away_team_id', 'score', 'home_team_name', 'away_team_name', 'matches.created_at as match_created')
            ->join('matches', 'checkins.match_id', '=', 'matches.id')
            ->where('user_id', $user->id)
            ->orderBy('match_created','desc')
            ->get();

        return $checkins;

    }

    public function forUserEvaluation($id) {

        $evaluations = DB::table('evaluations')
            ->select('evaluations.id as evaluation_id', 'player_id', 'evaluation', 'number', 'name', 'comment')
            ->join('players', 'evaluations.player_id' ,'=', 'players.id')
            ->where('posts_id', $id)
            ->get();

        return $evaluations;

    }

    public function edit_index($id) {

        return view('user_edit', compact('id'));

    }

    public function update(Request $request, $id) {

        $data = ['name' => $request->name, 'support_team_id' => $request->team];

        User::where('id', $id)
            ->update($data);

        return redirect(route('user_show', ['id' => $id,]))->with('flash_message', 'ユーザー情報を更新しました');

    }
}
