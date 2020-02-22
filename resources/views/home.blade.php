@extends('layouts.app')

@section('Twitter Card')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@alegoal2020" />
    <meta property="og:url" content="https://www.alegoal.jp" />
    <meta property="og:title" content="ALEGOAL | TOP PAGE" />
    <meta property="og:description" content="Jリーグの選手採点サイトです。" />
    <meta property="og:image" content="https://www.alegoal.jp/images/logo_web.png" />
@endsection

@section('content')
<div id="app">
    <div class="container">

         <div>
             <!-- フラッシュメッセージ -->
             @if (session('flash_message'))
                 <div class="flash_message">
                     {{ session('flash_message') }}
                 </div>
             @endif

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


