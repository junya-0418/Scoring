@extends('layouts.app')

@section('content')

    <div style="margin-left: 350px; font-size: 20px; margin-top: 30px;">送信を完了しました。</div>
    <button style="margin-left: 350px; margin-top: 20px;"　onclick="location.href='{{ route('home') }}'">トップページへ戻る</button>

{{--    <contact></contact>--}}

@endsection
