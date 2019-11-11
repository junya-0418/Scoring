<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


</head>
<body>
<!-- コンポーネントの配置 -->
<div id="app">
    <example-component></example-component>
</div>
<script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>
