<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Team;
use App\User;
use App\Post;

class UserController extends Controller
{
    public function index($id) {

        $teams = Team::all();

        $user = User::where('id', $id)->get()->first();

        $posts = DB::table('posts')
            ->join('matches', 'posts.match_id', '=', 'matches.id')
            ->where('user_id', $user->id)
            ->get();

        return view('user_index', compact('teams', 'user', 'posts'));

    }
}
