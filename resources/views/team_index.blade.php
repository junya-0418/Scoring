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
                    <div style="margin-top: 30px; font-size: 15px;">{{ $supporters_count }} Supporters</div>
                </div>

                <div class="user-card">
                    @foreach($posts as $post)
                    <div class="post-list" style="border-bottom: solid 1px #ccc; padding-bottom: 3px; margin: 7px 7px;">
                        <a href="{{ route('user_review', ['id' => $post->id]) }}">
                        <span style="display: block; margin-bottom: 3px; padding-left: 15px;">{{ $post->name }}</span>
                        <span style="font-size: 11px; padding-left: 15px;">{{ $post->match_type }} {{ $post->home_team_name }} vs {{ $post->away_team_name }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</div>
</div>

@endsection










