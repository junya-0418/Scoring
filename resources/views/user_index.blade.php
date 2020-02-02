@extends('layouts.app')

@section('content')
<div>
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 user-index-main">

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="user-box">
                        <h1 class="user-name">{{ $user->name }}</h1>

                        @if(Auth::check())
                            @if (Auth::user()->id  == $user->id)
                                <span class="edit-button">
                                    <button onclick="location.href='/user/edit/{{ $user->id }}'" class="btn btn-secondary" style="padding: 4px;">設定</button>
                                </span>
                            @endif
                        @endif
                    </div>

                    @if ($user->support_team_id !== null)
                    <p style="font-size: 12px; color: #6c757d">応援チーム</p>
                    <div class="support-team">
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












