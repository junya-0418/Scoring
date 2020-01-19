@extends('layouts.app')

@section('content')

    <form method="POST" action="/contact/send">
        {{ csrf_field() }}
        <div class="contact-form" style="width: 600px; margin-top: 30px; margin-left: auto; margin-right: auto;">
            <h1 style="font-size: 30px; margin-bottom: 30px;">お問い合わせ</h1>

            <div style="margin-bottom: 15px;">
                <div style="float: left;">
                    <label for="last-name">姓</label>
                    <div>
                        <input type="text" style="margin-right: 5px;" name="lastName" value="{{ old('lastName') }}">
                    </div>
                    <div class="error_txt"></div>
                </div>

                <div>
                    <label for="first-name">名</label>
                    <div>
                        <input type="text" name="firstName" value="{{ old('firstName') }}">
                    </div>
                    <div class="error_txt"></div>
                </div>
            </div>

            @if($errors->has('lastName'))
                <div class="error">
                    <p>{{ $errors->first('lastName') }}</p>
                </div>
            @endif

            @if($errors->has('firstName'))
                <div class="error">
                    <p>{{ $errors->first('firstName') }}</p>
                </div>
            @endif

            <div style="margin-bottom: 15px;">
                <label for="address">メールアドレス</label>
                <div>
                    <input type="text" style="width: 300px;" name="mailAddress" value="{{ old('mailAddress') }}">
                </div>
                <div class="error_txt"></div>
            </div>

            @if($errors->has('mailAddress'))
                <div class="error">
                    <p>{{ $errors->first('mailAddress') }}</p>
                </div>
            @endif

            <div>
                <label for="body">お問い合わせ内容</label>
                <div>
                    <textarea style="width: 600px; height: 200px;" name="body">{{ old('body') }}</textarea>
                </div>
                <div class="error_txt"></div>
            </div>

            @if($errors->has('body'))
                <div class="error">
                    <p>{{ $errors->first('body') }}</p>
                </div>
            @endif

            <button class="button expanded btn btn-primary" type="submit" style="float: right; margin-top: 15px;">送信</button>

        </div>
    </form>

@endsection
