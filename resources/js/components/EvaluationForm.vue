<template>
        <div class="evaluation-content">
                <div class="mb-3" style="margin-left: 9rem">
                    <label for="team">チーム</label>
                    <div>
                        <select id="team" name="team" v-model="selectedTeam" @change="fetchMatch" style="width: 400px">
                           <option v-for="team in teams">
                               {{ team.name }}
                           </option>
                        </select>
                    </div>
                </div>

                <div class="mb-3" style="margin-left: 9rem" >
                <label class="mr-3" for="match">試合</label>
                    <div>
                        <select name="match" v-model="selectedMatch" style="width: 400px">
                            <option v-for="match in matches">
                                {{ match.match_type }} {{ match.home_team_name }} vs {{ match.away_team_name }}
                            </option>
                        </select>
                    </div>
                </div>


                <div class="evaluation-form-button" style="float: right">
                    <button type="submit" style="width: 60px; margin-top: 20px; height: 40px;">投稿</button>
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
                players: []
            }
        },
        methods: {
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
        },
        created(){
            this.fetchTeams()
        },
    }
</script>
