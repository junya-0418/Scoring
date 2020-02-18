<template>
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div style="width: 350px; margin-top: 50px; display: inline-grid;">
                <div class="card-header"><strong>設定</strong></div>
                <div class="card-body">
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="name" style="margin-right: 30px; width: 100px; font-size: 12px;">名前</label>

                            <div style="margin-top: 5px;">
                                <input id="name" type="text"  name="name" v-model="username" style="padding-left: 3px;">
                            </div>
                        </div>

                        <div class="support-team-select" style="margin-left: 20px; margin-bottom: 20px; display: grid;">
                            <label for="team" style="margin-right: 30px; width: 100px; font-size: 12px;">応援チーム</label>
                            <select id="team" name="team"  style="width: 180px; height: 25px;" v-model="selectedTeam">
                                <option v-for="team in teams" v-bind:value="team.id">
                                    {{ team.name }}
                                </option>
                            </select>
                            <span class="cp_sl06_highlight"></span>
                            <span class="cp_sl06_selectbar"></span>
                        </div>

                        <!--    エラー表示-->
                        <div v-if="errors.length">
                            <div v-for="error in errors" style="color: #dc143c;">
                                {{ error }}
                            </div>
                        </div>

                        <div style="float: right; margin-top: 20px;">
                            <button type="button" v-on:click="goPrevious(user_id)" class="btn btn-secondary" style="margin-right: 10px;">
                                キャンセル
                            </button>

                            <button type="submit" class="btn btn-primary" v-on:click="formCheck">
                                保存
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>

</div>

</template>

<style>
    @media (min-width: 767px) {

        .form-group input {
            border: solid 1px #ccc;
            border-radius: 0.25rem;
            background-color: #f0f8ff;
        }

        .post-card a:hover {
            background-color: #f0f8ff;
        }

        .user-name h1 {
            margin-bottom: 30px;
        }


        .post-card a {
            text-decoration: none;
            color: black;
        }

    }
    @media (max-width: 479px) {
        .form-group input {
            border: solid 1px #ccc;
            border-radius: 0.25rem;
            background-color: #f0f8ff;
        }

        .post-card a:hover {
            background-color: #f0f8ff;
        }

        .user-name h1 {
            margin-bottom: 30px;
        }


        .post-card a {
            text-decoration: none;
            color: black;
        }

        .support-team-select select {
            border: solid 1px #ccc;
            border-radius: 0.25rem;
        }
    }

</style>

<script>

    import axios from 'axios';

    export default {
        data(){
            return {
                errors: [],
                user_id: location.href.split('/').pop(),
                username: '',
                teams: [{name: '横浜FM', id: 21},
                    {name: 'FC東京', id: 22},
                    {name: '鹿島アントラーズ', id: 23},
                    {name: '川崎フロンターレ', id: 24},
                    {name: 'C大阪', id: 25},
                    {name: 'サンフレッチェ広島', id: 26},
                    {name: 'G大阪', id: 27},
                    {name: 'ヴィッセル神戸', id: 28},
                    {name: '大分トリニータ', id: 29},
                    {name: 'コンサドーレ札幌', id: 30},
                    {name: 'ベガルタ仙台', id: 31},
                    {name: '清水エスパルス', id: 32},
                    {name: '名古屋グランパス', id: 33},
                    {name: '浦和レッズ', id: 34},
                    {name: 'サガン鳥栖', id: 35},
                    {name: '湘南ベルマーレ', id: 36},
                    {name: '柏レイソル', id: 37},
                    {name: '横浜FC', id: 38},
                ],
                selectedTeam: '',
            }
        },
        methods: {
            fetchUser: function() {
                axios.get('/api/forUserIndex/' + this.user_id).then((res)=>{
                    this.username = res.data.name
                })
            },
            goPrevious(id) {
                location.href="/users/" + id;
            },
            formCheck(e) {

                this.errors = []

                if (!this.username) {

                    this.errors.push('名前を入力してください')

                }

                if (this.errors.length) {
                    e.preventDefault();
                }

            }
        },
        mounted() {
            this.fetchUser()
            // axios.get('/api/get_teams').then((res) => {
            //     this.teams = res.data
            // })
        }
    }
</script>
