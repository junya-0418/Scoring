@extends('layouts.app')

@section('content')
    <div class="blog-container">
    @foreach($blogs as $blog)
        <a class="blog-cards">
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <div class="blog-content">{{ $blog->content }}</div>
        </a>
    @endforeach
    </div>
@endsection
