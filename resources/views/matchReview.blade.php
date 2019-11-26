<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue"></script>

    <!-- Styles -->
{{--    <script type="text/javascript" src="app.js"></script>--}}
    <link href="{{ asset('css/match_review.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('content')
<div id="app3">
    <div class="container">

        <div class="card" style="width: 550px;float: left;margin-left: 240px;">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        <div class="match-information">
            <div>{{ $match->date }}</div>
            <div>{{ $match->match_type }}</div>
            <div style="font-size: 30px; text-align: center">
                <strong>{{ $match->hometeam->name }} vs {{ $match->awayteam->name }}</strong>
            </div>
            <div style="font-size: 25px; text-align: center">
                <strong>{{ $match->score }}</strong>
            </div>
        </div>

        <div class="card" style="margin-top: 20px">
            <div style="margin-bottom: 10px; margin-left: 5rem;"><strong>Man of the Match</strong></div>
                <div class="mvp-card">
                    @foreach( $mvp_outputs as $mvp)
                    {{ $mvp->number }} {{ $mvp->name }} {{ $mvp->player_count }}票
                    @endforeach
                </div>

        </div>

        <div class="card" style="margin-top: 20px">
            <div style="margin-bottom: 10px; margin-left: 5rem;"><strong>Evaluations</strong></div>
            <div class="mvp-card">
                @foreach( $user_evaluation_outputs as $user_evaluation)
                    <div>{{ $user_evaluation->user_id }} {{ $user_evaluation->name }} {{ $user_evaluation->evaluation }}</div>
                @endforeach
            </div>

        </div>

        </div>
        <div id="sidebar" style="float: right;">
            <ul style= "list-style: none">
                <li>

                </li>
            </ul>
        </div>

    </div>

</div>
@endsection


