<template>
<div>
    <div class="input1-content">
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

        <div class="evaluation-form-button">
            <button class="button06" type="submit" @click="nextForm">
                送信
            </button>
        </div>

    </div>
</div>

</template>

<style>
    @media (min-width: 767px) {



    }
    @media (max-width: 479px) {


    }

</style>

<script>

    export default {
        data(){
            return {
                errors: [],
                selectedTeam: '',
                selectedMatch: '',
                selectedPlayer: '',
                title: '',
                teams: [{name: 'レアルマドリード', id: 1},
                    {name: 'FCバルセロナ', id: 2},
                ],
                matches: [],
                players: [],
                selectedPlayerForEvaluation: '',
                selectedNumberForEvaluation: '',
                loading: false,
            }
        },
        methods: {
            fetchMatchandPlayer: function() {
                this.loading = true
                this.selectedMatch = ''
                this.selectedPlayer = ''
                this.fetchPlayer();
            },
            fetchPlayer: function () {
                var team = {
                    'team': this.selectedTeam
                };
                axios.post('/api/get_vote_players', team).then((res)=>{
                    this.players = res.data
                })
                    .finally(() => this.loading = false)
            },
            nextForm: function (e) {

                this.errors = [];

                if (!this.selectedTeam) {
                    this.errors.push('チームを選択してください');
                    e.preventDefault();
                }

                if (!this.selectedPlayer) {
                    this.errors.push('Man of the matchを選択してください');
                    e.preventDefault();
                }

            },
        },

    }
</script>
