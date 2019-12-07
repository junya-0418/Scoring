<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/user-index.css') }}" rel="stylesheet">
</head>


@extends('layouts.app')

@section('content')
<div id="app">
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 4rem">

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-bottom: 10px; font-size: 20px;">{{ $match->match_type }}</div>
                    <div style="margin-bottom: 10px; font-size: 25px;">{{ $match->home_team_name }} vs {{ $match->away_team_name }}</div>
                    <div style="margin-bottom: 20px; font-size: 20px;">{{ $match->score }}</div>
                    <div style="margin-bottom: 20px">{{ $user->name }}</div>

                    <p>Man of the Match</p>
                    <div style="margin-bottom: 15px;">{{ $mvp_player }}</div>

                    @foreach($evaluations as $evaluation)
                        <div style="background-color: #fff; padding: 3px 10px 3px 10px;">
                            <div style="margin-bottom: 5px;">{{ $evaluation->number }} {{ $evaluation->name }} {{ $evaluation->evaluation }}</div>
                            <div style="border-bottom: solid 1px #ccc; margin-bottom: 10px;">{{ $evaluation->comment }}</div>
                        </div>
                    @endforeach

                    @if(Auth::check())
                        <form action="" method="POST">
                            {{ csrf_field() }}
                            <div style="margin-top: 20px;">コメント</div>
                            <textarea name="comment" style="width: 730px; height: 80px;"></textarea>
                            <input type="submit" value="送信" style="float: right; margin-top: 5px;">
                        </form>
                    @endif

                </div>
            </div>

        </div>
    </div>

</div>

</div>


@endsection










