<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue"></script>

    <!-- Styles -->
{{--    <script type="text/javascript" src="app.js"></script>--}}
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('content')
<div id="app3">
    <div class="container">

        <div class="card" style="width: 550px;float: left;margin-left: 240px;">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div>{{ $match->hometeam->name }}</div>
            <div>{{ $match->awayteam->name }}</div>

        </div>
        <div id="sidebar" style="float: right;">
            <ul style= "list-style: none">
                <li>
                    <button style="width:100%;padding:10px;font-size:15px;"
                            onclick="location.href='{{ route('evaluation_form') }}'">Man of the match 投票</button>
                </li>
            </ul>
        </div>

    </div>

</div>
@endsection


