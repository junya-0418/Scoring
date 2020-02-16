@extends('layouts.app')

@section('content')

    @foreach($blogs as $blog)
    <div>{{ $blog->title }}</div>
    <div>{{ $blog->content }}</div>
    @endforeach

@endsection
