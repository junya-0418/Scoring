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

        <div class="match-information">
            <div>{{ $match->date }}</div>
            <div>{{ $match->match_type }}</div>
            <div style="font-size: 30px; text-align: center">
                <strong>{{ $match->hometeam->name }} vs {{ $match->awayteam->name }}</strong>
            </div>
            <div style="font-size: 25px; text-align: center">
                <strong>{{ $match->score }}</strong>
            </div>
        </div>

        <div class="mvp-area" style="margin-top: 20px">
            <div style="margin-bottom: 10px">Man of the Match</div>

            <table border="1" width="600px">
                <tr align="center">
                    <th>Team</th>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Count</th>
                </tr>
                <tr align="center">
                    <td>川崎フロンターレ</td>
                    <td>34</td>
                    <td>山村 和也</td>
                    <td>10</td>
                </tr>
                <tr align="center">
                    <td>川崎フロンターレ</td>
                    <td>10</td>
                    <td>大島 僚太</td>
                    <td>8</td>
                </tr>
                <tr align="center">
                    <td>川崎フロンターレ</td>
                    <td>41</td>
                    <td>家長 昭博</td>
                    <td>3</td>
                </tr>
            </table>
        </div>

        <div class="scoring-area" style="margin-top: 30px">
            <div class="card" style="width: 600px">
                <div style="border: dashed 1px #ccc; background-color: #fff">
                    test_user
                </div>
            </div>
        </div>


        </div>
        <div id="sidebar" style="float: right;">
            <ul style= "list-style: none">
                <li>

                </li>
            </ul>
        </div>

    </div>

</div>
@endsection


