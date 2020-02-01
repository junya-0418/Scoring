@extends('layouts.app')

@section('content')

    <form method="POST" action="/contact/send">
        {{ csrf_field() }}
        <div class="contact-form">
            <h1>お問い合わせ</h1>

            <div class="name-form">
                <div class="name">
                    <label for="name">お名前</label>
                    <div>
                        <input type="text" style="margin-right: 5px;" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="error_txt"></div>
                </div>

            </div>

            <div class="mail-form">
                <label for="address">メールアドレス</label>
                <div>
                    <input type="text" name="mailAddress" value="{{ old('mailAddress') }}">
                </div>
                <div class="error_txt"></div>
            </div>

            @if($errors->has('name'))
                <div class="error">
                    <p>{{ $errors->first('name') }}</p>
                </div>
            @endif

            @if($errors->has('mailAddress'))
                <div class="error">
                    <p>{{ $errors->first('mailAddress') }}</p>
                </div>
            @endif

            <div class="body-form">
                <label for="body">お問い合わせ内容</label>
                <div>
                    <textarea name="body">{{ old('body') }}</textarea>
                </div>
                <div class="error_txt"></div>
            </div>

            @if($errors->has('body'))
                <div class="error">
                    <p>{{ $errors->first('body') }}</p>
                </div>
            @endif

            <button class="button expanded btn btn-primary contact-form-button" type="submit">送信</button>

        </div>
    </form>

@endsection
