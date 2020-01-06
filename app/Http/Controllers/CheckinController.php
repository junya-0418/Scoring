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
use App\Match;

class CheckinController extends Controller
{
    public function getCounts(Request $request) {

        $counts = Checkin::where('match_id', $request->match_id)->get()->count();

        return $counts;

    }

    public function judge(Request $request) {

        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $counts = Checkin::where('match_id', $request->match_id)->where('user_id', $user_id)->get()->count();

            if ($counts >= 1) {
                return 0;
            }

            return 1;

        } else {
            return 2;
        }
    }


    public function store(Request $request) {

        $user_id = Auth::user()->id;

        Checkin::create([
            'user_id' => $user_id,
            'match_id' => $request->match_id
        ]);

        $counts = Checkin::where('match_id', $request->match_id)->get()->count();

        return $counts;

    }

    public function destroy(Request $request) {

        $user_id = Auth::user()->id;

        Checkin::where('user_id', $user_id)->where('match_id', $request->match_id)->delete();

        $counts = Checkin::where('match_id', $request->match_id)->get()->count();

        return $counts;
    }
}
