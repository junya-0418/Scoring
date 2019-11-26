<template>
<div>
    <div style="float: right">
        <select class="cp_sl06" id="match" name="match" v-model="selectedMatchType">
            <option v-for="type in matchTypes">
                {{ type }}
            </option>
        </select>
    </div>
    <div class="card" style="width: 600px;margin-left: 240px; border: solid 1px #ccc; background-color: #fff;" v-for="match in filteredMatches">
    <div style="padding: 10px;">
        <div style="width: 600px; padding: 15px 30px; margin-bottom: 15px;">
            <div style="float: left">
                <div>{{ match.date }}</div>
                <div>{{ match.match_type }}</div>
                <div><strong>{{ match.home_team_name }} vs {{ match.away_team_name }}</strong></div>
                <div>{{ match.score }}</div>
            </div>
            <div>
                <button class="button05" style="float: right; margin-top: 50px;"
                        @click="goNext(match.id)">詳細を見る</button>
            </div>
        </div>
    </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return {
                matches: [],
                selectedMatchType: 'J1 第32節',
                matchTypes: ['J1 第32節', 'J1 第31節']
            }
        },
        methods: {
            fetchMatch: function() {
                axios.get('/api/forsearch').then((res)=>{
                    this.matches = res.data
                })

            },
            goNext: function (id) {
                location.href="/match/review/" + id;
            }
        },
        computed: {
            filteredMatches: function() {

                var matches = [];

                for(var i in this.matches) {

                    var match = this.matches[i];

                    if(match.match_type == this.selectedMatchType) {

                        matches.push(match);

                    }

                }

                return matches;

            }
        },
        created(){
            this.fetchMatch()
        },
    }
</script>
