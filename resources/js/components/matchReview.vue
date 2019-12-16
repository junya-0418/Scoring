<template>
<div>
    <div style="margin-bottom: 10px; margin-left: 5rem;"><strong>平均採点</strong></div>
    <div style="margin-bottom: 40px; display: flex">
        <div class="evaluation-card-left">
            <div style="border-bottom: solid 1px #ccc; background-color: #ccc; font-size: 12px; padding-left: 7px">Home Team</div>
            <div>
                <div class="player-name" v-for="home_team_evaluation in home_team_evaluation_outputs" style="border-bottom: solid 1px #ccc; padding-left: 7px" @click="openModal(home_team_evaluation.player_id)">
                    {{ home_team_evaluation.number }} {{ home_team_evaluation.name }} {{ home_team_evaluation.player_evaluation_average.toFixed(1) }}
                </div>
            </div>
        </div>
        <div class="evaluation-card-right">
            <div style="border-bottom: solid 1px #ccc; background-color: #ccc; font-size: 12px; padding-left: 7px">Away Team</div>
            <div>
                <div class="player-name" v-for="away_team_evaluation in away_team_evaluation_outputs" style="border-bottom: solid 1px #ccc; padding-left: 7px" @click="openModal(away_team_evaluation.player_id)">
                    {{ away_team_evaluation.number }} {{ away_team_evaluation.name }} {{ away_team_evaluation.player_evaluation_average.toFixed(1) }}
                </div>
            </div>
        </div>
    </div>

<!--    モーダルウィンドウ-->
    <div id="overlay" v-show="showContent"　v-on:click="closeModal">
        <div id="modal-window" @click="stopEvent">
            <div v-for="comment in comments" style="border-bottom: solid 1px #ccc; margin-bottom: 20px; padding-bottom: 5px;">
                <div>{{ comment.comment}}</div>
                <div>{{ comment.user_name }}  {{ comment.evaluation.toFixed(1) }}</div>
            </div>
            <button class="btn btn-primary" v-on:click="closeModal" style="float: right">Close</button>
        </div>
    </div>

    <div style="margin-bottom: 10px; margin-left: 5rem;"><strong>ユーザー</strong></div>
    <div style="margin-bottom: 40px; display: flex" >
        <div class="users-card-left">
            <div style="background-color: #ccc; font-size: 12px; padding-left: 7px">ホームチームに投稿したユーザー</div>
            <div class="user_name" v-for="home_team_user in home_team_users" @click="goNext(home_team_user.id)" style="border-bottom: solid 1px #ccc;">
                    {{ home_team_user.name }}
            </div>
        </div>
        <div class="users-card-right">
            <div style="background-color: #ccc; font-size: 12px; padding-left: 7px">アウェイチームに投稿したユーザー</div>
            <div class="user_name" v-for="away_team_user in away_team_users" @click="goNext(away_team_user.id)" style="border-bottom: solid 1px #ccc;">
                    {{ away_team_user.name }}
            </div>
        </div>
    </div>

</div>

</template>

<style>
    #overlay{
        /*　要素を重ねた時の順番　*/
        z-index:1;

        /*　画面全体を覆う設定　*/
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);

        /*　画面の中央に要素を表示させる設定　*/
        display: flex;
        align-items: center;
        justify-content: center;

    }

    #modal-window {
        z-index:2;
        width:50%;
        padding: 1em;
        background:#fff;
    }

    .player-name:hover {
        background-color: #f0f8ff;
        cursor: pointer;
    }

    .user_name:hover {
        background-color: #f0f8ff;
        cursor: pointer;
    }

</style>

<script>

    export default {
        data(){
            return {
                items: [],
                match_id: location.href.split('/').pop(),
                home_team_evaluation_outputs: [],
                away_team_evaluation_outputs: [],
                home_team_users: [],
                away_team_users: [],
                comments: [],
                showContent: false,
            }
        },
        methods: {
            fetchEvaluation: function() {
                axios.get('/api/getMatchReviewData/' + this.match_id).then((res)=>{
                    this.items = res.data
                    this.home_team_evaluation_outputs = this.items['home_team_evaluation_outputs']
                    this.away_team_evaluation_outputs = this.items['away_team_evaluation_outputs']
                    this.home_team_users = this.items['home_team_users']
                    this.away_team_users = this.items['away_team_users']
                })
            },

            goNext(id) {
                location.href="/users/" + id;
            },
            openModal: function(id) {
                this.showContent = true

                var match_id = {
                    'match_id': this.match_id
                };

                axios.post('/api/getPlayerComments/' + id, match_id).then((res)=>{
                    this.comments = res.data
                })

                console.log(this.comments)
            },
            closeModal: function() {
                this.showContent = false
                this.comments = ''
            },
            stopEvent: function(){
                event.stopPropagation()
            },
        },
        mounted(){
            this.fetchEvaluation()
        },
    }
</script>
