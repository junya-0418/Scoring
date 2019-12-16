<template>
<div>
    <div class="user-posts">
        <p style="color: #6c757d;">投稿した試合</p>
        <div class="post-card" v-for="post in posts">
            <a href="javascript:void(0)" @click="gonext(post.posts_id)">
                <div class="match-information" style="display: flex">{{ post.match_type }} {{ post.home_team_name }} vs {{ post.away_team_name }}</div>
                <div style="display: flex;">
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

</div>

</template>

<style>

    .post-card a:hover {
        background-color: #f0f8ff!important;
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

            gonext(id) {
                location.href="/user/match/review/" + id;
            }
        },
        created(){
            this.fetchUser()
        },
    }
</script>
