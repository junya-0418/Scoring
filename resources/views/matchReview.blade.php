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
<div id="app">
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

        <matchreview-component></matchreview-component>

        </div>

    </div>
</div>
@endsection


