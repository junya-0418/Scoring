<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Team;
use App\User;
use App\Post;
use App\Match;
use App\Mvp;
use App\Player;
use App\Evaluation;
use App\Comment;

class UserReviewController extends Controller
{
    public function index($id) {

        $post = Post::where('id', $id)->get()->first();

        $match = Match::where('id', $post->match_id)->get()->first();

        $user = User::where('id', $post->user_id)->get()->first();

        $mvp_id = Mvp::where('posts_id', $post->id)->get()->first()->player_id;

        $mvp_player = Player::where('id', $mvp_id)->get()->first();

        $evaluations = DB::table('evaluations')
            ->select('evaluations.id as evaluation_id', 'player_id', 'evaluation', 'number', 'name', 'comment')
            ->join('players', 'evaluations.player_id' ,'=', 'players.id')
            ->where('posts_id', $post->id)
            ->get();

        $comments = Comment::where('post_id', $post->id)->orderBy('created_at','desc')->get();

        return view('user_review_detail', compact('post', 'match', 'user','mvp_player', 'evaluations', 'comments'));

    }

    public function comment_create(Request $request) {

        $user_id = Auth::user()->id;

        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => $user_id,
        ]);

        return back();

    }
}
