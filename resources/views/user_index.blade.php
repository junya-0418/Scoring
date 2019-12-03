<head>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/user-index.css') }}" rel="stylesheet">
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

                    <h1 class="user-name" style="margin-bottom: 30px;">{{ $user->name }}</h1>

                    <user-index></user-index>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

@endsection










