<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Styles -->
{{--    <link href="{{ asset('css/user-index.css') }}" rel="stylesheet">--}}
</head>


@extends('layouts.app')

@section('content')
<div id="app">
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2rem">

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

                    <label for="manofthematch" style="border-bottom: solid 1px #ccc; width: 114px;">Man of the Match</label>
                    <div id="manofthematch" style="background-color: #fff; width: 200px; padding: 10px 20px; margin-bottom: 20px;">
                        <div>{{ $mvp_player->name }}</div>
                    </div>

                    @foreach($evaluations as $evaluation)
                        <div style="background-color: #fff; padding:5px 10px;">
                            <div style="margin-top: 5px; margin-bottom: 5px;">{{ $evaluation->number }} {{ $evaluation->name }} {{ $evaluation->evaluation }}</div>
                            <div style="border-bottom: solid 1px #ccc;">{{ $evaluation->comment }}</div>
                        </div>
                    @endforeach

                    @if(Auth::check())
                        <form action="{{ route('comment_create') }}" method="POST">
                            {{ csrf_field() }}
                            <div style="margin-top: 20px; color: #6c757d;">コメント</div>
                            <input type="hidden" name="post_id"　value="{{ $post->id }}">
                            <textarea name="comment" style="width: 730px; height: 80px;"></textarea>
                            <input class="btn btn-primary" type="submit" value="送信" style="float: right; margin-top: 5px;">
                        </form>
                    @endif

                    <span style="margin-top: 20px;"><strong>コメント</strong></span>
                    @foreach($comments as $comment)
                    <div style="width: 730px; background-color: #fff; margin-top: 20px; border: solid 1px #ccc;">
                        <div style="padding: 3px 10px 5px 10px;">{{ $comment->user->name }}</div>
                        <div style="padding: 3px 10px 5px 10px; float: right; font-size: 10px;">{{ $comment->created_at }}</div>
                        <div style="padding: 3px 10px 5px 10px;">{{ $comment->comment }}</div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

</div>

</div>


@endsection










