<template>
<!--    １つ目のフォーム-->
<div>
    <div class="input1-content" v-bind:style="{display: show}">
        <div class="mb-3">
            <label for="team" class="cp_sl06_selectlabel">チーム</label>
            <div class="cp_ipselect">
                <select class="cp_sl06" id="team" name="team" v-model="selectedTeam" @change="fetchMatchandPlayer">
                    <option v-for="team in teams">
                        {{ team.name }}
                    </option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
            </div>
        </div>

        <div class="mb-3">
            <label class="mr-3 cp_sl06_selectlabel" for="match">試合</label>
            <div class="cp_ipselect">
                <select class="cp_sl06" id="match" name="match" v-model="selectedMatch">
                    <option v-for="match in matches" v-bind:value="match.id">
                        {{ match.match_type }} {{ match.home_team_name }} vs {{ match.away_team_name }}
                    </option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
            </div>
        </div>

        <div class="mb-3">
            <label class="mr-3 cp_sl06_selectlabel" for="mvp">Man of the Match</label>
            <div class="cp_ipselect">
                <select class="cp_sl06" id="mvp" name="mvp" v-model="selectedPlayer">
                    <option v-for="player in players" v-bind:value="player.id">
                        {{ player.number }} {{ player.name }}
                    </option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
            </div>
        </div>

        <div class="evaluation-form-button" style="float: right;">
            <button class="button06" type="button"   style="margin-right: 50px; margin-top: 5px" v-on:click="nextForm">
                次へ進む
            </button>
        </div>

    </div>

    <!--    ２つ目のフォーム-->
    <div class="input2-content" v-bind:style="{display: show2}" style="margin-left: 30px;">

        <div class="mb-3" style="float: left">
            <label class="mr-3 cp_sl06_selectlabel" for="player_for_second_form" style="font-size: 12px">選手</label>
            <div class="cp_ipselect" style="width: 300px">
                <select class="cp_sl06" id="player_for_second_form" name="player" style="width: 300px" v-model="selectedPlayerForEvaluation">
                    <option v-for="player in players" v-bind:value="player.id">
                        {{ player.number }} {{ player.name }}
                    </option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
            </div>
        </div>

        <div class="mb-3" style="display: flow-root">
            <label class="mr-3 cp_sl06_selectlabel" for="evaluation" style="font-size: 12px">採点</label>
            <div class="cp_ipselect" style="width: 70px">
                <select class="cp_sl06" id="evaluation" name="evaluation" style="width: 70px; padding-left: 10px;" v-model="selectedNumberForEvaluation">
                    <option v-for="number in numbers">
                        {{ number }}
                    </option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
            </div>
        </div>

        <div class="evaluation-form-button" style="float: right;">
            <button class="button06" type="button"  style="margin-right: 50px; margin-top: 5px" v-on:click="backForm">
                戻る
            </button>
            <button class="button06" type="submit"  style="margin-right: 50px; margin-top: 5px">
                送信
            </button>
        </div>
    </div>

</div>
</template>

<script>
    export default {
        data(){
            return {
                selectedTeam: '',
                selectedMatch: '',
                selectedPlayer: '',
                teams: [],
                matches: [],
                players: [],
                show: 'block',
                show2: 'none',
                numbers: [1.0, 1.5, 2.0, 2.5, 3.0, 3.5, 4.0, 4.5, 5.0, 5.5, 6.0, 6.5, 7.0, 7.5, 8.0, 8.5, 9.0, 9.5],
                selectedPlayerForEvaluation: '',
                selectedNumberForEvaluation: '',
            }
        },
        methods: {
            fetchMatchandPlayer: function() {
                this.fetchMatch();
                this.fetchPlayer();
            },
            fetchTeams: function() {
                axios.get('/api/get_teams').then((res)=>{
                    this.teams = res.data
                })
            } ,
            fetchMatch: function() {

                var team = {
                    'team': this.selectedTeam
                };
                axios.post('/api/get_matches', team).then((res)=>{
                    this.matches = res.data
                })

            },
            fetchPlayer: function () {
                var team = {
                    'team': this.selectedTeam
                };
                axios.post('/api/get_players', team).then((res)=>{
                    this.players = res.data
                })
            },
            nextForm: function () {
                this.show = 'none'
                this.show2 = 'block'
            },
            backForm: function () {
                this.show = 'block'
                this.show2 = 'none'
            }
        },
        created(){
            this.fetchTeams()
        },
    }
</script>
