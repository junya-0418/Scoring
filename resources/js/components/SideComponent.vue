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

    .side-column-main {
        float: right;
        width: 290px;
        margin-right: 50px;
    }

    .calendar-main{
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
    .btn-gradation {
        display: inline-block;
        text-align: left;
        background-image: linear-gradient(#eaeaea 0%, #c6c6c6 100%);
        box-shadow: inset 0 2px 0 rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.19);
        color: #a5a5a5;
        font-size: 16px;
        text-decoration: none;
        font-weight: bold;
        text-shadow: 1px 1px 1px rgba(255, 255, 255, 1);
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 16px;
    }

    .btn-gradation:hover {
        opacity: 0.8;
    }

    .custom-select-wrapper {
        position: relative;
        display: inline-block;
        user-select: none;
    }
    .custom-select-wrapper select {
        display: none;
    }
    .custom-select {
        position: relative;
        display: inline-block;
    }
    .custom-select-trigger {
        position: relative;
        display: block;
        width: 130px;
        padding: 0 84px 0 22px;
        font-size: 22px;
        font-weight: 300;
        color: #fff;
        line-height: 60px;
        background: #5c9cd8;
        border-radius: 4px;
        cursor: pointer;
    }
    .custom-select-trigger:after {
        position: absolute;
        display: block;
        content: '';
        width: 10px; height: 10px;
        top: 50%; right: 25px;
        margin-top: -3px;
        border-bottom: 1px solid #fff;
        border-right: 1px solid #fff;
        transform: rotate(45deg) translateY(-50%);
        transition: all .4s ease-in-out;
        transform-origin: 50% 0;
    }
    .custom-select.opened .custom-select-trigger:after {
        margin-top: 3px;
        transform: rotate(-135deg) translateY(-50%);
    }
    .custom-options {
        position: absolute;
        display: block;
        top: 100%; left: 0; right: 0;
        min-width: 100%;
        margin: 15px 0;
        border: 1px solid #b5b5b5;
        border-radius: 4px;
        box-sizing: border-box;
        box-shadow: 0 2px 1px rgba(0,0,0,.07);
        background: #fff;
        transition: all .4s ease-in-out;

        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transform: translateY(-15px);
    }
    .custom-select.opened .custom-options {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
        transform: translateY(0);
    }
    .custom-options:before {
        position: absolute;
        display: block;
        content: '';
        bottom: 100%; right: 25px;
        width: 7px; height: 7px;
        margin-bottom: -4px;
        border-top: 1px solid #b5b5b5;
        border-left: 1px solid #b5b5b5;
        background: #fff;
        transform: rotate(45deg);
        transition: all .4s ease-in-out;
    }
    .option-hover:before {
        background: #f9f9f9;
    }
    .custom-option {
        position: relative;
        display: block;
        padding: 0 22px;
        border-bottom: 1px solid #b5b5b5;
        font-size: 18px;
        font-weight: 600;
        color: #b5b5b5;
        line-height: 47px;
        cursor: pointer;
        transition: all .4s ease-in-out;
    }
    .custom-option:first-of-type {
        border-radius: 4px 4px 0 0;
    }
    .custom-option:last-of-type {
        border-bottom: 0;
        border-radius: 0 0 4px 4px;
    }
    .custom-option:hover,
    .custom-option.selection {
        background: #f9f9f9;
    }

    .cell-content {
        text-align:left;
        width: 70px;
        height: 50px;
        font-size: 50%;
        /* border: 1px solid #efefef; */
    }
    .cell-content-line {
        border-bottom: 1px solid #efefef;
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


