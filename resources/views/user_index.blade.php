@extends('layouts.app')

@section('content')
<div id="app">
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-left: 15rem; margin-top: 2rem" >

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="display: flex">
                    <h1 class="user-name" style="margin-bottom: 30px;">{{ $user->name }}</h1>

                    @if(Auth::check())
                        @if (Auth::user()->id  == $user->id)
                            <span style="margin-left: 30px; margin-top: 10px;">
                                <button onclick="location.href='/user/edit/{{ $user->id }}'" class="btn btn-secondary" style="padding: 4px;">設定</button>
                            </span>
                        @endif
                    @endif
                    </div>

                    @if ($user->support_team_id !== null)
                    <p style="font-size: 12px; color: #6c757d">応援チーム</p>
                    <div style="margin-bottom: 20px; font-size: 14px; border: solid 1px #ccc; width: 200px; padding: 6px 8px; background-color: #fff; border-radius: 5px; text-align: center;">
                        <strong>{{ $user_support_team->name }}</strong>
                    </div>
                    @endif

                    <user-index></user-index>

                </div>
            </div>

        </div>

    </div>
</div>
</div>

@endsection












