@extends('layouts.app')

@section('content')
<div id="app">
<div>
    <div class="container">
        <div>
            <div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="team-card">
                    <div><strong>{{ $team->name }}</strong></div>
                    <div class="supporters-count">{{ $supporters_count }} Supporters</div>
                </div>

                <div class="user-card">
                    @foreach($posts as $post)
                        <div class="post-list">
                            <a href="{{ route('user_review', ['id' => $post->id]) }}">
                                <span class="post-list-username">{{ $post->name }}</span>
                                <span class="post-list-information">{{ $post->match_type }} {{ $post->home_team_name }} vs {{ $post->away_team_name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="players-card">
                    @foreach($players as $player)
                        <div class="player-text">
                            <div style="width: 20px; text-align: center;">
                                <div style="width: 30px; display: contents;">{{ $player->number }}</div>
                            </div>
                            <div style="margin-left: 10px;">{{ $player->name }}</div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</div>
</div>

@endsection










