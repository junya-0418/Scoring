<template>
<div>
    <div class="user-posts">
        <div>
            <a href="javascript:void(0)" @click="goPosted" style="color: #6c757d; display: inline; margin-right: 20px;" v-bind:style="{ borderBottom: postedLine }">投稿した試合</a>
            <a href="javascript:void(0)" @click="goCheckin" style="color: #6c757d; display: inline;" v-bind:style="{ borderBottom: checkinLine }">観戦した試合</a>
        </div>

        <div v-bind:style="{ display: posted }" style="margin-top: 20px;">
            <div class="card" style="width: 500px; border-bottom: solid 1px #ccc; background-color: #fff; margin-bottom: 15px;" v-for="post in posts">
                <a class="match-card" href="javascript:void(0)" @click="goUserReview(post.posts_id)">
                    <div class="match-information" style="display: flex">{{ post.match_type }} {{ post.home_team_name }} vs {{ post.away_team_name }}</div>
                    <div style="display: flex; padding-left: 20px;">
                        <div style="font-size: 12px; margin-right: 10px;">team</div>
                        <div v-if="post.team_id === post.home_team_id" style="margin-bottom: 15px;">
                            {{ post.home_team_name }}
                        </div>
                        <div v-else style="margin-bottom: 15px;">
                            {{ post.away_team_name }}
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div v-bind:style="{ display: checkin }" style="margin-top: 20px;">
            <div class="card" style="width: 500px; border-bottom: solid 1px #ccc; background-color: #fff; margin-bottom: 15px;" v-for="usercheckin in UserCheckins">
                <a class="match-card" href="javascript:void(0)" @click="goMatch(usercheckin.match_id)">
                    <div class="match-information" style="display: flex">
                        {{ usercheckin.match_type }}
                    </div>
                    <div class="match-information" style="display: flex">
                        {{ usercheckin.home_team_name }} vs {{ usercheckin.away_team_name }}
                    </div>
                </a>
            </div>
        </div>

    </div>

</div>

</template>

<style>

    .card a:hover {
        background-color: #f0f8ff;
    }

    .user-name h1 {
        margin-bottom: 30px;
    }

    /*.card {*/
    /*    padding-left: 15px;*/
    /*    background-color: #fff;*/
    /*    border: solid 1px #ccc;*/
    /*    width: 500px;*/
    /*    border-radius: 8px;*/
    /*    margin-bottom: 15px;*/
    /*}*/

    .card a {
        text-decoration: none;
        color: black;
    }

    .match-information {

        margin-top: 10px;
        margin-bottom: 15px;
        padding-left: 20px;
    }


</style>

<script>

    import axios from 'axios';

    export default {
        data(){
            return {
                posted: 'block',
                checkin: 'none',
                postedLine: 'solid 3px #ccc',
                checkinLine: 'none',
                user_id: location.href.split('/').pop(),
                user: [],
                posts: [],
                UserCheckins: [],
                showContent: false,
                evaluations: ''
            }
        },
        methods: {
            fetchUser: function() {
                axios.get('/api/forUserIndex/' + this.user_id).then((res)=>{
                    this.user = res.data
                })

                axios.get('/api/forUserPost/' + this.user_id).then((res)=>{
                    this.posts = res.data
                })

                axios.get('/api/forUserCheckin/' + this.user_id).then((res)=>{
                    this.UserCheckins = res.data
                })
            },

            goPosted() {
                this.posted = 'block',
                this.checkin = 'none',
                this.postedLine = 'solid 3px #ccc',
                this.checkinLine = 'none'
            },

            goCheckin() {
                this.posted = 'none',
                this.checkin = 'block'
                this.postedLine = 'none',
                this.checkinLine = 'solid 3px #ccc'
            },

            goUserReview(id) {
                location.href="/user/match/review/" + id;
            },

            goMatch(id) {
                location.href="/match/review/" + id;
            }
        },
        created(){
            this.fetchUser()
        },
    }
</script>
