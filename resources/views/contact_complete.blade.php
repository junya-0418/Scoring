@extends('layouts.app')

@section('content')

    <div class="contact-complete-main">
        <div class="contact-complete-text">送信を完了しました。</div>
        <button class="go-top-page btn-secondary" onclick="location.href='{{ route('home') }}'">トップページへ戻る</button>
    </div>

@endsection
