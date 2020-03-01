@extends('layouts.app')

@section('Twitter Card')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@alegoal2020" />
    <meta property="og:url" content="https://alegoal.jp/vote" />
    <meta property="og:title" content="ALEGOAL | クラシコMVP投票" />
    <meta property="og:description" content="クラシコMVPを投票しましょう！" />
    <meta property="og:image" content="https://alegoal.jp/images/logo_web.png" />
@endsection

@section('content')
    <div id="app">
        <div class="evaluation-content">
            <div class="container">
                <div class="row justify-content-center">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- フラッシュメッセージ -->
                    @if (session('flash_message'))
                        <div class="flash_message">
                            {{ session('flash_message') }}
                        </div>
                    @endif

                    <div class="col-md-8 evaluation-form-main">

                        <div class="card" style="margin-top: 30px">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ route('vote_create') }}" method="POST">
                                {{ csrf_field() }}
                                <vote-form></vote-form>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
