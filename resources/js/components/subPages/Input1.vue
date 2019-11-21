<template>
        <div class="evaluation-content">
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
                    <label class="mr-3 cp_sl06_selectlabel" for="player">Man of the Match</label>
                    <div class="cp_ipselect">
                        <select class="cp_sl06" id="player" name="player" v-model="selectedPlayer">
                            <option v-for="player in players" v-bind:value="player.id">
                                {{ player.number }} {{ player.name }}
                            </option>
                        </select>
                        <span class="cp_sl06_highlight"></span>
                        <span class="cp_sl06_selectbar"></span>
                    </div>
                </div>

                <div class="evaluation-form-button" style="float: right;">
                    <button class="button06" type="submit" style="margin-right: 50px; margin-top: 5pxP">投稿</button>
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
            }
        },
        created(){
            this.fetchTeams()
        },
    }
</script>
