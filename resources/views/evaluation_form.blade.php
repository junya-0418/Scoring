<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/evaluation.css') }}" rel="stylesheet">
</head>


@extends('layouts.app')

@section('content')
<div class="evaluation-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div id="app3" class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <label for="category">Category</label>
                    <select name="category" v-model="selectedCategory" @change="fetchTags">
                        <option v-for="category in categories" :value="category.id">
                            @{{ category.name }}
                        </option>
                    </select>
{{--                    <label for="team">チーム</label>--}}
{{--                    <select name="team" v-model="selectedTeam" @change="fetchMatch_Player">--}}
{{--                        <option v-for="team in teams" v-bind:value="team.id"></option>--}}
{{--                    </select>--}}

                    <label for="match">試合</label>
                    <select name="match">
                        @foreach ($matches as $match)
                            <option value="{{ $match->match_type }}">
                                {{ $match->match_type }} {{$match->hometeam->name}} vs {{$match->awayteam->name}}
                            </option>
                        @endforeach
                    </select>

                    <label for="player">Man of the match</label>
                    <select name="player" id="player">
                        @foreach ($players as $player)
                            <option value="{{ $player->name }}">
                                {{$player->number}} {{ $player->name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="evaluation-form-button" style="float: right">
                        <button type="submit" style="width: 60px; margin-top: 20px; height: 40px;">投稿</button>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<script src="https://unpkg.com/vue"></script>
<script>
    var app3 = new Vue({
        el: '#app3',
        data: {
            selectedCategory: '',
            selectedTag: '',
            categories: [
                {id: 1, name: 'Tech'},
                {id: 2, name: 'Design'},
                {id: 3, name: 'Report'},
            ],
            tags: []
        },
        methods: {
            fetchTags: function() {
                var tmp_tags = [];
                if (this.selectedCategory == 1) {
                    tmp_tags = [
                        {id: 1, name: 'iOS'},
                        {id: 2, name: 'Android'},
                        {id: 3, name: 'FrontEnd'},
                        {id: 4, name: 'BackEnd'},
                        {id: 5, name: 'Server'},
                    ]
                } else if (this.selectedCategory == 2) {
                    tmp_tags = [
                        {id: 6, name: 'UI / UX'},
                        {id: 7, name: 'Tools'},
                    ]
                } else if (this.selectedCategory == 3) {
                    tmp_tags = [
                        {id: 8, name: 'Events'},
                        {id: 9, name: 'Products'},
                    ]
                } else {
                    alert('Invalid value!!')
                }

                this.tags = tmp_tags;
            }
        }
    })
</script>
@endsection






