@extends('layouts.app')

@section('content')
<div id="app">
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2rem">

                <div class="card2">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-bottom: 10px; font-size: 15px; margin-left: 50px;"><strong>{{ $match->match_type }}</strong></div>
                    <div style="margin-bottom: 10px; font-size: 25px; text-align: center;"><strong>{{ $match->home_team_name }} vs {{ $match->away_team_name }}</strong></div>
                    <div style="margin-bottom: 20px; font-size: 20px; text-align: center;"><strong>{{ $match->score }}</strong></div>
                    <a class="username" href="/users/{{ $user->id }}" style="margin-bottom: 20px;">{{ $user->name }}</a>

                    <label for="manofthematch" style="border-bottom: solid 1px #ccc; width: 114px;">Man of the Match</label>
                    <div >
                        <div id="manofthematch" style="background-color: #fff; width: 200px; padding: 10px 20px; margin-bottom: 20px; text-align: center; display: inline; float: left;">
                            <div>{{ $mvp_player }}</div>
                        </div>
                    </div>

                    @foreach($evaluations as $evaluation)
                        <div style="background-color: #fff; padding:5px 10px;">
                            <div style="margin-top: 5px; margin-bottom: 5px;">{{ $evaluation->number }} {{ $evaluation->name }} {{ sprintf('%.1f',$evaluation->evaluation) }}</div>
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










