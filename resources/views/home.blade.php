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

         <div class="card" style="width: 600px;margin-left: 240px; border: dashed 1px #ccc; background-color: #fff;">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach($matches as $match)
                    <div style="padding: 10px; border: dashed 1px #ccc;">
                        <div style="width: 600px; padding: 15px 30px; margin-bottom: 15px;">
                                <div style="float: left">
                                    <div>{{ $match->date }}</div>
                                    <div>{{ $match->match_type }}</div>
                                    <div><strong>{{ $match->hometeam->name }} vs {{ $match->awayteam->name }}</strong></div>
                                    <div>{{ $match->score }}</div>
                                </div>
                                 <div>
                                    <button class="button05" style="float: right; margin-top: 50px;"
                                        onclick="location.href='{{ route('match_review', ['id' => $match->id]) }}'">詳細を見る</button>
                                </div>
                        </div>
                    </div>
                    @endforeach

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


