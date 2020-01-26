<template>
<div>
    <div class="evaluation-title"><strong>平均採点</strong></div>
    <div class="average-score-main">
        <div class="evaluation-card-left">
            <div class="team-index">Home Team</div>
            <div>
                <div class="player-name" v-for="home_team_evaluation in home_team_evaluation_outputs" @click="openModal(home_team_evaluation.player_id)">
                    <div style="display: inline; float: left; margin-right: 1.25rem; width: 10px;">
                        {{ home_team_evaluation.number }}
                    </div>
                    <div style="display: contents;">
                        {{ home_team_evaluation.name }}
                    </div>
                    <div style="float: right; padding-right: 10px;">
                        {{ home_team_evaluation.player_evaluation_average.toFixed(1) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="evaluation-card-right">
            <div class="team-index">Away Team</div>
            <div>
                <div class="player-name" v-for="away_team_evaluation in away_team_evaluation_outputs" @click="openModal(away_team_evaluation.player_id)">
                    <div style="display: inline; float: left; margin-right: 1.25rem; width: 10px;">
                        {{ away_team_evaluation.number }}
                    </div>
                    <div style="display: contents;">
                        {{ away_team_evaluation.name }}
                    </div>
                    <div style="float: right; padding-right: 10px;">
                        {{ away_team_evaluation.player_evaluation_average.toFixed(1) }}
                    </div>
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

    <div class="user-index"><strong>ユーザー</strong></div>
    <div class="user-main">
        <div class="users-card-left">
            <div style="background-color: #ccc; font-size: 12px; padding-left: 17px">ホームチームに投稿したユーザー</div>
            <div class="user_name" v-for="home_team_user in home_team_users" @click="goNext(home_team_user.id)" style="border-bottom: solid 1px #ccc; padding-left: 17px;">
                    {{ home_team_user.name }}
            </div>
        </div>
        <div class="users-card-right">
            <div style="background-color: #ccc; font-size: 12px; padding-left: 17px">アウェイチームに投稿したユーザー</div>
            <div class="user_name" v-for="away_team_user in away_team_users" @click="goNext(away_team_user.id)" style="border-bottom: solid 1px #ccc; padding-left: 17px;">
                    {{ away_team_user.name }}
            </div>
        </div>
    </div>

</div>

</template>

<style>

    @media (min-width: 767px) {

        .evaluation-title {
            margin-bottom: 10px;
            margin-left: 5rem;
            margin-top: 20px;
        }

        .average-score-main {
            margin-bottom: 40px;
            display: flex;
        }

        .team-index {
            border-bottom: solid 1px #ccc;
            background-color: #ccc;
            font-size: 12px;
            padding-left: 17px;
        }

        .player-name {
            border-bottom: solid 1px #ccc;
            padding-left: 7px;
        }

        .user-index{
            margin-bottom: 10px;
            margin-left: 5rem;
        }

        .user-main {
            margin-bottom: 40px;
            display: flex;
        }

        .evaluation-card-left {
            float: left;
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
            /*display: inline-block;*/
        }


        .evaluation-card-right {
            /*float: right;*/
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
            display: inline-block;
            margin-left: 50px;
        }

        .users-card-left {
            /*float: left;*/
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
        }


        .users-card-right {
            float: right;
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
            display: inline-block;
            margin-left: 50px;
        }

        #overlay {
            /*　要素を重ねた時の順番　*/
            z-index: 1;

            /*　画面全体を覆う設定　*/
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);

            /*　画面の中央に要素を表示させる設定　*/
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #modal-window {
            z-index: 2;
            width: 50%;
            padding: 1em;
            background: #fff;
        }

        .player-name:hover {
            background-color: #f0f8ff;
            cursor: pointer;
        }

        .user_name:hover {
            background-color: #f0f8ff;
            cursor: pointer;
        }

        button.cp_btn {
            position: relative;
            display: block;
            width: 160px;
            padding: 4px;
            text-align: center;
            text-decoration: none;
            color: #FFF;
            background: #26C6DA;
            border-bottom: 2px solid #00838F;
            border-radius: 4px;
            box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.2), 0 2px 2px rgba(0, 0, 0, 0.19);
        }

        button.cp_btn:active {
            border-bottom: 2px solid #26C6DA;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
        }
    }

    @media (max-width: 479px) {

        .evaluation-title {
            margin-bottom: 10px;
            margin-left: 5rem;
            margin-top: 20px;
        }

        .average-score-main {
            margin-bottom: 40px;
        }

        .team-index {
            border-bottom: solid 1px #ccc;
            background-color: #ccc;
            font-size: 12px;
            padding-left: 17px;
        }

        .player-name {
            border-bottom: solid 1px #ccc;
            padding-left: 7px;
        }

        .evaluation-card-left {

            margin-left: 50px;
            margin-bottom: 20px;

        }

        .user-index{
            margin-bottom: 10px;
            margin-left: 5rem;
        }

        .user-main {
            margin-bottom: 40px;
        }

        .evaluation-card-left {
            float: left;
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
            /*display: inline-block;*/
        }


        .evaluation-card-right {
            /*float: right;*/
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
            display: inline-block;
            margin-left: 50px;
        }

        .users-card-left {
            /*float: left;*/
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
            margin-left: 50px;
            margin-bottom: 20px;
        }


        .users-card-right {
            width: 250px;
            border: solid 1px #ccc;
            background-color: #fff;
            /*text-align: center;*/
            font-size: 15px;
            display: inline-block;
            margin-left: 50px;
        }

        #overlay {
            /*　要素を重ねた時の順番　*/
            z-index: 1;

            /*　画面全体を覆う設定　*/
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);

            /*　画面の中央に要素を表示させる設定　*/
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #modal-window {
            z-index: 2;
            width: 80%;
            padding: 1em;
            background: #fff;
        }

        .player-name:hover {
            background-color: #f0f8ff;
            cursor: pointer;
        }

        .user_name:hover {
            background-color: #f0f8ff;
            cursor: pointer;
        }

        button.cp_btn {
            position: relative;
            display: block;
            width: 160px;
            padding: 4px;
            text-align: center;
            text-decoration: none;
            color: #FFF;
            background: #26C6DA;
            border-bottom: 2px solid #00838F;
            border-radius: 4px;
            box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.2), 0 2px 2px rgba(0, 0, 0, 0.19);
        }

        button.cp_btn:active {
            border-bottom: 2px solid #26C6DA;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
        }

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
