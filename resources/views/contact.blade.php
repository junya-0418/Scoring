@extends('layouts.app')

@section('content')

    <form method="POST" action="/contact/send">
        {{ csrf_field() }}
        <div class="contact-form">
            <h1>お問い合わせ</h1>

            <div class="name-form">
                <div class="last-name">
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

            <div class="mail-form">
                <label for="address">メールアドレス</label>
                <div>
                    <input type="text" name="mailAddress" value="{{ old('mailAddress') }}">
                </div>
                <div class="error_txt"></div>
            </div>

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
