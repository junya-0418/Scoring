<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/team_index.css') }}" rel="stylesheet">
</head>


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
                    <div>Supporters</div>
                </div>

                <div class="information-card">
                    <strong>Coming Soon</strong>
                </div>

                <div class="user-card">
                    @foreach($posts as $post)
                    <div style="border-bottom: solid 1px #ccc; padding-bottom: 3px; margin: 7px 7px;">
                        <span style="display: block; margin-bottom: 3px;">{{ $post->name }}</span>
                        <span style="font-size: 11px;">{{ $post->match_type }} {{ $post->home_team_name }} vs {{ $post->away_team_name }}</span>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</div>
</div>

@endsection










