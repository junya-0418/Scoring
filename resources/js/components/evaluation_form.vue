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

        <div v-if="errors.length">
            <div v-for="error in errors" style="color: #dc143c;">
                {{ error }}
            </div>
        </div>

        <div class="load-wrapp">
            <div v-if="loading" class="load-4">
                <div class="ring-1"></div>
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

        <child-component v-bind:players="players" @backForm="backForm"></child-component>

    </div>

</div>
</template>

<style>
    .ring-1 {
        width: 10px;
        height: 10px;
        margin: 0 auto;
        padding: 10px;
        border: 7px dashed #4b9cdb;
        border-radius: 100%;
    }

    .load-4 .ring-1
    {animation: loadingD 1.5s .3s cubic-bezier(.17,.37,.43,.67) infinite;}

    .load-wrapp {
        top: 120px;
        left: 180px;
        width: 100px;
        height: 100px;
        margin: 0 auto;
        border-radius: 5px;
        text-align: center;
        position: absolute;
        z-index: 9999;
    }

    /*.load-wrapp p {padding: 0 0 20px;}*/
    /*.load-wrapp:last-child {margin-right: 0;}*/

    /* =Animate the stuff
    ------------------------ */
    @keyframes loadingD {
    0 {transform: rotate(0deg);}
    50% {transform: rotate(180deg);}
    100% {transform: rotate(360deg);}
    }

</style>

<script>
    import childComponent from './evaluation-child.vue'

    export default {
        data(){
            return {
                errors: [],
                selectedTeam: '',
                selectedMatch: '',
                selectedPlayer: '',
                teams: [],
                matches: [],
                players: [],
                show: 'block',
                show2: 'none',
                selectedPlayerForEvaluation: '',
                selectedNumberForEvaluation: '',
                loading: true,
            }
        },
        components: {
            childComponent
        },
        methods: {
            fetchMatchandPlayer: function() {
                this.loading = true
                this.selectedMatch = ''
                this.selectedPlayer = ''
                this.fetchMatch();
                this.fetchPlayer();
            },
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
                    .finally(() => this.loading = false)
            },
            nextForm: function (e) {

                if (this.selectedTeam && this.selectedMatch && this.selectedPlayer) {
                    this.show = 'none'
                    this.show2 = 'block'
                }

                this.errors = [];

                if (!this.selectedTeam) {
                    this.errors.push('チームを選択してください');
                }
                if (!this.selectedMatch) {
                    this.errors.push('試合を選択してください');
                }

                if (!this.selectedPlayer) {
                    this.errors.push('Man of the matchを選択してください');
                }

                e.preventDefault();

            },
            backForm: function () {
                this.show = 'block'
                this.show2 = 'none'
            },
        },
        mounted(){
            axios.get('/api/get_teams').then((res)=>{
                this.teams = res.data
            })
                .finally(() => this.loading = false)
        },
    }
</script>
