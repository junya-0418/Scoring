<template>
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">設定</div>

                    <div class="card-body" style="border: 1px solid #6c757d;">


                            <div class="form-group row" style="margin-left: 20px;">
                                <label for="name" style="margin-right: 30px; width: 100px;">名前</label>

                                <div>
                                    <input id="name" type="text"  name="name" v-model="username" style="padding-left: 3px;">
                                </div>
                            </div>

                            <div style="margin-left: 20px;">
                                <label for="team" style="margin-right: 30px; width: 100px;">応援チーム</label>
                                <select id="team" name="team"  style="width: 180px;" v-model="selectedTeam">
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

                            <div style="float: right;">
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

</div>

</template>

<style>

    .post-card a:hover {
        background-color: #f0f8ff;
    }

    .user-name h1 {
        margin-bottom: 30px;
    }

    .post-card {
        padding-left: 15px;
        background-color: #fff;
        border: solid 1px #ccc;
        width: 500px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .post-card a {
        text-decoration: none;
        color: black;
    }

    .match-information {

        margin-top: 10px;
        margin-bottom: 15px;

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
                teams: [],
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
            axios.get('/api/get_teams').then((res) => {
                this.teams = res.data
            })
        }
    }
</script>
