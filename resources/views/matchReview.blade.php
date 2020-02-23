@extends('layouts.app')

@section('Twitter Card')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@alegoal2020" />
    <meta property="og:url" content="https://alegoal.jp/match/review/{{ $match->id }}" />
    <meta property="og:title" content="ALEGOAL | Match Review" />
    <meta property="og:description" content="{{ $match->match_type }} | {{ $match->hometeam->name }} vs {{ $match->awayteam->name }}" />
    <meta property="og:image" content="https://alegoal.jp/images/logo_web.png" />
@endsection

@section('content')
<div id="app">
    <div class="container">

        <div class="matchReviewMain">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="match-information">
                <div>{{ $match->date }}</div>
                <div>{{ $match->match_type }}</div>
                <div>{{ $match->stadium->name }}</div>
                <div style="font-size: 24px; text-align: center; margin-top: 1rem;">
                    <div><strong>{{ $match->hometeam->name }}</strong></div>
                    <div> vs </div>
                    <div><strong>{{ $match->awayteam->name }}</strong></div>
                </div>
                <div style="font-size: 25px; text-align: center">
                    <strong>{{ $match->score }}</strong>
                </div>
            </div>

            <checkin></checkin>

            <div class="evaluationCard">
                <div class="mvp-title"><strong>Man of the Match</strong></div>
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

    <div class="no-display-at-sp" style="margin-right: 80px;">
        <forgoform></forgoform>
        <side-component></side-component>
    </div>

</div>
@endsection


