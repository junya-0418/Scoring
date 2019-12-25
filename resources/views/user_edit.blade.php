@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <user-edit></user-edit>
    </form>

@endsection
