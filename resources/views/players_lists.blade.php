<head>
<!-- Styles -->
<link href="{{ asset('css/player.css') }}" rel="stylesheet">
</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="md-layout md-gutter">
                    <div class="md-layout-item">
                        @foreach($players as $player)
                            <ul class="player_list pt-3">
                                <li>{{ $player->number }}</li>
                                <li>{{ $player->name }}</li>
                                <li>{{ $player->team->name }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
