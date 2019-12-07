<template>
<div>
    <div class="user-posts">
        <p>投稿した試合</p>
        <div class="post-card" v-for="post in posts" style="border: solid 1px #ccc; width: 500px;">
            <div class="match-information">{{ post.match_type }} {{ post.home_team_name }} vs {{ post.away_team_name }}</div>
            <p style="font-size: 12px;">team</p>
            <div v-if="post.team_id === post.home_team_id" style="margin-bottom: 15px; float: left;">
                {{ post.home_team_name }}
            </div>
            <div v-else style="margin-bottom: 15px; float: left;">
                {{ post.away_team_name }}
            </div>
            <span><button style="margin-left: 17rem; margin-bottom: 10px;" @click="gonext(post.posts_id)">詳細を見る</button></span>
        </div>
    </div>

</div>

</template>

<style>
    .user-name h1 {
        margin-bottom: 30px;
    }

    .post-card {
        padding-left: 15px;
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
                user_id: location.href.slice(-1),
                user: [],
                posts: [],
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
            },
            // openModal: function(id) {
            //     this.showContent = true
            //
            //     axios.get('/api/forUserEvaluation/' + id).then((res)=>{
            //         this.evaluations = res.data
            //     })
            //
            // },
            // closeModal: function() {
            //     this.showContent = false
            //     this.evaluations = ''
            // },
            // stopEvent: function(){
            //     event.stopPropagation()
            // },
            gonext(id) {
                location.href="/user/match/review/" + id;
            }
        },
        created(){
            this.fetchUser()
        },
    }
</script>
