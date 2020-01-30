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

            <div class="no-display-at-sp">
                <side-component></side-component>
            </div>

        </div>

    </div>

</div>
@endsection


