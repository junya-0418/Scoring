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
{{--        <div class="row justify-content-center" style=" width: 600px;">--}}
{{--            <div class="col-md-8">--}}

                <div class="card" style="width: 550px;float: left;margin-left: 240px;">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach($matches as $match)
                    <div style="padding: 5px;">
                        <div style="padding: 30px 30px; margin-bottom: 15px; border: dashed 1px #ccc; background-color: #fff" >
                                <div>{{ $match->date }}</div>
                                <div>{{ $match->match_type }}</div>
                                <div><strong>{{ $match->hometeam->name }} vs {{ $match->awayteam->name }}</strong></div>
                                <div>{{ $match->score }}</div>
                                <button style="float: right"
                                        onclick="location.href='{{ route('match_review', ['id' => $match->id]) }}'">詳細を見る</button>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div id="sidebar" style="float: right;">
                    <ul style= "list-style: none">
                        <li>
                            <button style="width:100%;padding:10px;font-size:15px;"
                                    onclick="location.href='{{ route('evaluation_form') }}'">Man of the match 投票</button>
                        </li>
                    </ul>
                </div>
{{--            </div>--}}
{{--        </div>--}}

    </div>

</div>
@endsection


