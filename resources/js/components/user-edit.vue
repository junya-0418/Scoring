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
                                    <input id="name" type="text"  name="name" v-bind:value="user.name" required autocomplete="name" autofocus>

<!--                                    @error('name')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                    @enderror-->
                                </div>
                            </div>

                            <div class="form-group row" style="margin-left: 20px;">
                                <label for="text" style="margin-right: 30px; width: 100px;">自己紹介文</label>

                                <div>

                                    <textarea name="text" id="text" cols="30" rows="10" style="height: 130px; width: 500px;"></textarea>

<!--                                    @error('name')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                    @enderror-->
                                </div>
                            </div>

                            <div style="margin-left: 20px;">
                                <label for="team" style="margin-right: 30px; width: 100px;">応援チーム</label>
                                <select id="team" name="team"  style="width: 180px;" v-bind:value="''">
                                    <option v-for="team in teams">
                                        {{ team.name }}
                                    </option>
                                </select>
                                <span class="cp_sl06_highlight"></span>
                                <span class="cp_sl06_selectbar"></span>
                            </div>

                            <div style="float: right;">
                                <button class="btn btn-secondary" style="margin-right: 10px;">
                                    キャンセル
                                </button>

                                <button type="submit" class="btn btn-primary">
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
                user_id: location.href.split('/').pop(),
                user: [],
                teams: [],
            }
        },
        methods: {
            fetchUser: function() {
                axios.get('/api/forUserIndex/' + this.user_id).then((res)=>{
                    this.user = res.data
                })
            },

            gonext(id) {
                location.href="/user/match/review/" + id;
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
