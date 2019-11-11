<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function create(Request $request) {

        Team::create(['name' => $request->name]);

        return redirect('/home');

    }
}
