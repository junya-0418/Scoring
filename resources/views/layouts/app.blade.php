<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zidane</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">--}}

</head>
<body>
    <div id="app2">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Zidane
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                    <button class="btn-flat-border"
                                            onclick="location.href='{{ route('register') }}'">新規登録</button>
                                </li>
                            @endif
                        @else


{{--                                <button class="button05" v-on:click="showContent=true" class="mr-2">選手登録</button>--}}

                                <button class="btn-flat-border"
                                    onclick="location.href='{{ route('evaluation_form') }}'">投稿</button>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="javascript:void(0)"
                                       @click="go_user_page({{ Auth::user()->id }})">
                                        マイページ
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>

                </div>

            </div>
        </nav>

        <nav>
            <div style="border-bottom: solid 1px #ccc; width: 100%; margin-bottom: 10px; margin-top: 20px;">
                <ul class="glonavi" style="margin-left: 300px;">
                    <li><a class="glonavi-menu" href="/" style="margin-left: 30px">Home</a></li>
                    <li><a class="glonavi-menu" href="/" style="margin-left: 30px">チーム</a></li>
                    <li><a class="glonavi-menu" href="/" style="margin-left: 30px">試合一覧</a></li>
                </ul>
            </div>
        </nav>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>採点を行ってから送信してください</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>

{{--        <footer id="globalfooter">--}}
{{--            <div class="footer-container">--}}
{{--                <div style="font-size: 30px;"><strong>Zidane</strong></div>--}}
{{--            </div>--}}
{{--        </footer>--}}
    </div>

    <script src="https://unpkg.com/vue"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>--}}
    <script>
        var app2 = new Vue({
            el: '#app2',
            data: {
                showContent: false
            },
            methods: {
                openModal: function() {
                    this.showContent = true
                },
                closeModal: function() {
                    this.showContent = false
                },
                stopEvent: function(){
                    event.stopPropagation()
                },
                go_user_page(id) {
                    location.href="/users/" + id;
                }
            }
        });


    </script>
</body>
</html>
