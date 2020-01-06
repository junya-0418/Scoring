@extends('layouts.app')

@section('content')
<div id="app">
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>採点を行ってから送信してください</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-8" style="margin-left: 15rem; margin-top: 4rem" >

                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('evaluation_create') }}" method="POST">
                        {{ csrf_field() }}
                        <evaluation-form></evaluation-form>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
</div>

@endsection









