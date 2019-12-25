@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('user_update', ['id' => $id]) }}">
        @csrf
        <user-edit></user-edit>
    </form>

@endsection
