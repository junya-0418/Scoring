<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vote;

class VoteController extends Controller
{
    public function index() {

        return view('vote');

    }

    public function create(Request $request) {

        Vote::create([
            'world_player_id' => $request->mvp,
        ]);

        return redirect('/vote')->with('flash_message', '投票ありがとうございます! 投票結果は後ほど発表します!');

    }
}
