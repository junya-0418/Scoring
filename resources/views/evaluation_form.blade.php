<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue"></script>

    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/evaluation.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('content')
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <label for="team">チーム</label>
                    <select name="team" id="team">
                        @foreach ($teams as $team)
                            <option value="{{ $team->name }}">{{ $team->name }}</option>
                        @endforeach
                    </select>

                    <label for="match">試合</label>
                    <select name="match" id="match">
                        @foreach ($matches as $match)
                            <option value="{{ $match->match_type }}">
                                {{ $match->match_type }} {{$match->hometeam->name}} vs {{$match->awayteam->name}}
                            </option>
                        @endforeach
                    </select>

                    <label for="player">Man of the match</label>
                    <select name="player" id="player">
                        @foreach ($players as $player)
                            <option value="{{ $player->name }}">
                                {{$player->number}} {{ $player->name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="evaluation-form-button" style="float: right">
                        <button type="submit" style="width: 60px; margin-top: 20px; height: 40px;">投稿</button>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection


