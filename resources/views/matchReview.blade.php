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

        <div style="width: 550px;margin-left: 240px;">

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

        <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
            <div style="margin-bottom: 20px; margin-left: 5rem;"><strong>Man of the Match</strong></div>
                <div class="mvp-card">
                    @foreach( $mvp_outputs as $mvp)
                    <div style="border-bottom: solid 1px #ccc; font-size: 15px">
                        {{ $mvp->number }} {{ $mvp->name }} {{ $mvp->player_count }}票
                    </div>
                    @endforeach
                </div>

        </div>

        <div style="margin-bottom: 10px; margin-left: 5rem;"><strong>平均採点</strong></div>
        <div style="margin-bottom: 40px; display: flex">
            <div class="evaluation-card-left">
                <div style="border-bottom: solid 1px #ccc; background-color: #ccc; font-size: 12px; padding-left: 7px">Home Team</div>
                <div>
                    @foreach( $home_team_evaluation_outputs as $home_team_evaluation)
                    <div style="border-bottom: solid 1px #ccc; padding-left: 7px">
                    {{ $home_team_evaluation->number }} {{ $home_team_evaluation->name }} {{ $home_team_evaluation->player_evaluation_average }}
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="evaluation-card-right">
                <div style="border-bottom: solid 1px #ccc; background-color: #ccc; font-size: 12px; padding-left: 7px">Away Team</div>
                <div>
                    @foreach( $away_team_evaluation_outputs as $away_team_evaluation)
                    <div style="border-bottom: solid 1px #ccc; padding-left: 7px">
                        {{ $away_team_evaluation->number }} {{ $away_team_evaluation->name }} {{ $away_team_evaluation->player_evaluation_average }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div style="margin-bottom: 10px; margin-left: 5rem;"><strong>ユーザー</strong></div>
        <div style="margin-bottom: 40px; display: flex" >
            <div class="users-card-left">
                <div style="border-bottom: solid 1px #ccc; background-color: #ccc; font-size: 12px; padding-left: 7px">ホームチームに投稿したユーザー</div>
                <div>
                    @foreach( $home_team_users as $home_team_user)
                        <a class="user_name" href="{{ route('user_show', ['id' => $home_team_user->id]) }}">
                            {{ $home_team_user->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="users-card-right">
                <div style="border-bottom: solid 1px #ccc; background-color: #ccc; font-size: 12px; padding-left: 7px">アウェイチームに投稿したユーザー</div>
                <div>
                    @foreach( $away_team_users as $away_team_user)
                        <a class="user_name" href="{{ route('user_show', ['id' => $away_team_user->id]) }}">
                            {{ $away_team_user->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        </div>

    </div>
</div>
@endsection


