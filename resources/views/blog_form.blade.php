@extends('layouts.app')

@section('content')
    <form action="{{ route('blog_create') }}" method="POST">
        {{ csrf_field() }}

        <div style="margin-left: 350px;">
            @if($errors->has('title'))
                <div class="error">
                    <p>{{ $errors->first('title') }}</p>
                </div>
            @endif

            @if($errors->has('title'))
                <div class="error">
                    <p>{{ $errors->first('text') }}</p>
                </div>
            @endif
        </div>

        <blog-form></blog-form>
    </form>
@endsection
