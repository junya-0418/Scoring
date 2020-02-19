<template>
<div>
    <div class="side-column-main">
        <div class="calendar-main">
            <v-calendar :attributes='attributes'>
                <div
                    slot="day-popover"
                    slot-scope="{ attributes }">
                    <div v-for="{key, customData} in attributes"
                         :key="key">
                        [{{ customData.match_type }}]
                       <div>{{ customData.home_team_name }} vs {{ customData.away_team_name }}</div>
                    </div>
                </div>
            </v-calendar>
        </div>

        <div class="player-ranking-card">
                <p style="font-size: 12px; margin-bottom: 0px !important;">ルヴァンカップ GL第1節</p>
                <p style="font-size: 12px;">プレーヤーランキング</p>
            <div v-if="players.length">
                    <div class="player-ranking" v-for="n in 5">
                        <div class="player-name-for-ranking"><strong>{{ n }}</strong>　{{ players[n - 1].name }}</div>
                        <div class="player-evaluation-for-ranking"><strong>{{ players[n - 1].player_evaluation_average.toFixed(1) }}</strong></div>
                    </div>
                </div>
        </div>
    </div>
</div>
</template>

<style>

    @media (min-width: 767px) {
        .side-column-main {
            float: right;
            width: 320px;
        }

        .calendar-main {
            margin-top: 58px;
            margin-right: 60px;
            margin-left: 60px;
        }

        .player-ranking-card {
            margin-top: 40px;
            margin-right: 60px;
            width: 280px;
            margin-left: 50px;
            background-color: #fff;
            padding: 15px 30px 10px 30px;
        }

        .player-ranking {
            font-size: 14px;
            border-bottom: solid 1px #ccc;
            margin-bottom: 15px;
        }

        .player-name-for-ranking {
            display: contents;
        }

        .player-evaluation-for-ranking {
            display: flex;
            float: right;
        }

        .card a:hover {
            background-color: #f0f8ff;
        }

    }
    @media (max-width: 479px) {

        .side-column-main {
            width: 290px;
            margin-right: 50px;
        }

        .calendar-main {
            margin-top: 30px;
            margin-left: 60px;
        }

        .player-ranking-card {
            margin-top: 40px;
            margin-right: 60px;
            width: 280px;
            margin-left: 50px;
            background-color: #fff;
            padding: 15px 30px 10px 30px;
        }

        .player-ranking {
            font-size: 14px;
            border-bottom: solid 1px #ccc;
            margin-bottom: 15px;
        }

        .player-name-for-ranking {
            display: contents;
        }

        .player-evaluation-for-ranking {
            display: flex;
            float: right;
        }

        .card a:hover {
            background-color: #f0f8ff;
        }
    }
</style>

<script>

    import VCalendar from 'v-calendar'

    export default {
        data(){
            return {
                players: [],
                matches: [],
            }
        },
        computed: {
            attributes() {
                return [
                    // Attributes for matches
                    ...this.matches.map(match => ({
                        dates: match.date,
                        bar: {
                            color: 'blue',
                            class: match.isComplete ? 'opacity-75' : '',
                        },
                        popover: {
                            visibility: 'hover',
                            hideIndicator: true,
                        },
                        customData: match,
                    })),
                ];
            },
        },
        mounted(){
            axios.get('/api/getPlayerRanking').then((res)=>{
                this.players = res.data
            }),
            axios.get('/api/forsearch').then((res)=>{
                this.matches = res.data
            })
        },
    }
</script>


