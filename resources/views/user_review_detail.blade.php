@extends('layouts.app')

@section('Twitter Card')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@alegoal2020" />
    <meta property="og:url" content="https://www.alegoal.jp/user/match/review/{{ $post->id }}" />
    <meta property="og:title" content="ALEGOAL | {{ $post->title }} by {{ $user->name }}" />
    <meta property="og:description" content="{{ $match->match_type }} | {{ $match->hometeam->name }} vs {{ $match->awayteam->name }}" />
    <meta property="og:image" content="https://www.alegoal.jp/images/logo_web.png" />
@endsection

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

                    @if(Auth::check())
                        @if (Auth::user()->id  == $user->id)
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="caret"></span>
                                        <span class="caret"></span>
                                        <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{ route('delete',['id' => $post->id]) }}"
                                           onclick="event.preventDefault();
                                             document.getElementById('delete-button').submit();">
                                            削除
                                        </a>

                                        <form id="delete-button" action="{{ route('delete',['id' => $post->id]) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    @endif

                    <div style="margin-bottom: 10px; font-size: 15px; margin-left: 50px;"><strong>{{ $match->match_type }}</strong></div>
                    <div style="margin-bottom: 10px; font-size: 15px; margin-left: 50px;"><strong>{{ $match->stadium->name }}</strong></div>
                    <div class="user-detail-match-information"><strong>{{ $match->hometeam->name }}</strong></div>
                    <div class="user-detail-match-information"><strong>vs</strong></div>
                    <div class="user-detail-match-information"><strong>{{ $match->awayteam->name }}</strong></div>
                    <div class="user-detail-match-information"><strong>{{ $match->score }}</strong></div>
                    <a class="username" href="/users/{{ $user->id }}">{{ $user->name }}</a>

                    <label for="title" style="border-bottom: solid 1px #ccc; width: 30px;">Title</label>
                    <div >
                        <div id="title">
                            <div>{{ $post->title }}</div>
                        </div>
                    </div>

                    <label for="manofthematch" style="border-bottom: solid 1px #ccc; width: 114px;">Man of the Match</label>
                    <div >
                        <div id="manofthematch">
                            <div>{{ $mvp_player }}</div>
                        </div>
                    </div>

                    @foreach($evaluations as $evaluation)
                        <div class="user-detail-evaluation">
                            <div style="margin-top: 5px; margin-bottom: 5px;">{{ $evaluation->number }} {{ $evaluation->name }} {{ sprintf('%.1f',$evaluation->evaluation) }}</div>
                            <div style="border-bottom: solid 1px #ccc;">{{ $evaluation->comment }}</div>
                        </div>
                    @endforeach

                    @if(Auth::check())
                        <form action="{{ route('comment_create') }}" method="POST">
                            {{ csrf_field() }}
                            <div style="margin-top: 20px; color: #6c757d;">コメント</div>
                            <input type="hidden" name="post_id"　value="{{ $post->id }}">
                            <textarea name="comment" class="comment-box"></textarea>
                            <input class="btn btn-primary" type="submit" value="送信" style="float: right; margin-top: 5px;">
                        </form>
                    @endif

                    <span style="margin-top: 20px;"><strong>コメント</strong></span>
                    <span style="font-size: 10px;">(コメント投稿にはログインが必要です)</span>
                    @foreach($comments as $comment)
                    <div class="users-comment">
                        <div style="padding: 3px 10px 5px 10px; display: flex;">{{ $comment->user->name }}</div>
                        <div style="padding: 3px 10px 5px 10px; float: right; font-size: 10px;">{{ $comment->created_at }}</div>
                        <div style="padding: 3px 10px 5px 10px; display: inline-block;">{{ $comment->comment }}</div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

</div>

</div>


@endsection










