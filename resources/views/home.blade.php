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
<div id="app">
    <div class="container">

         <div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <search-component></search-component>
            <side-component></side-component>


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


