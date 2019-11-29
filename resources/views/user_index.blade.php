<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/evaluation.css') }}" rel="stylesheet">
</head>


@extends('layouts.app')

@section('content')
<div id="app">
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-left: 15rem; margin-top: 4rem" >

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <h1 class="user-name" style="margin-bottom: 20px">{{ $user->name }}</h1>

                    <div class="user-posts">
                        <p>このユーザーが投稿した試合</p>
                            @foreach($posts as $post)
                            <div style="border: solid 1px #ccc; width: 400px">
                            <div style="margin-bottom: 15px;">{{ $post->match_type }} {{ $post->home_team_name }} vs {{ $post->away_team_name }}</div>
                        <p>投稿したチーム</p>
                            <div style="margin-bottom: 15px">
                                @if($post->team_id == $post->home_team_id)
                                    {{ $post->home_team_name }}
                                @else
                                    {{$post->away_team_name}}
                                @endif
                            </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

@endsection

<script src=" {{ mix('js/app.js') }} "></script>








