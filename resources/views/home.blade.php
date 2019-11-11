<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue"></script>

    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('content')
<div id="app3">
    <div class="container">
        <div class="row justify-content-center" style=" width: 600px;">
            <div class="col-md-8">

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($matches as $match)
                    <div style="padding: 5px; border-bottom: solid 1px #ccc;">
                        <div style="padding-left: 30px;">
                                <div>{{ $match->date }}</div>
                                <div>{{ $match->match_type }}</div>
                                <div>{{ $match->hometeam->name }} vs {{ $match->awayteam->name }}</div>
                                <div>{{ $match->score }}</div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>

        <div class="evaluation-button">
            <button style="width:100%;padding:10px;font-size:25px;" onclick="location.href='{{ route('evaluation_form') }}'">+</button>
        </div>

    </div>
</div>
@endsection


