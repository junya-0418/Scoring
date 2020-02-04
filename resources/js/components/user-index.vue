<template>
<div>

    <div class="user-posts">
        <div>
            <a href="javascript:void(0)" @click="goPosted" class="posted-match" v-bind:style="{ borderBottom: postedLine }">投稿した試合</a>
            <a href="javascript:void(0)" @click="goCheckin" class="checkin-match" v-bind:style="{ borderBottom: checkinLine }">観戦した試合</a>
        </div>

        <div v-bind:style="{ display: posted }" style="margin-top: 20px;">
            <div class="card match-board" v-for="post in displayLists">
                <a class="match-card" href="javascript:void(0)" @click="goUserReview(post.posts_id)">
                    <div class="match-info">
                        <div>{{ post.match_type }}</div>
                        <div>{{ post.home_team_name }} vs {{ post.away_team_name }}</div>
                    </div>
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

            <div class="text-center">
                <paginate v-model="page" :page-count="length"
                           :total-visible="5" @input="pageChange" :container-class="'pagination'"
                          :page-class="'page-item'"></paginate>
            </div>

        </div>

        <div v-bind:style="{ display: checkin }" style="margin-top: 20px;">
            <div class="card match-board" v-for="usercheckin in UserCheckins">
                <a class="match-card" href="javascript:void(0)" @click="goMatch(usercheckin.match_id)">
                    <div class="match-info">
                        {{ usercheckin.match_type }}
                    </div>
                    <div class="match-info">
                        {{ usercheckin.home_team_name }} vs {{ usercheckin.away_team_name }}
                    </div>
                </a>
            </div>
        </div>

    </div>

</div>

</template>

<style>

    @media (min-width: 767px) {
        .posted-match {
            color: #6c757d;
            display: inline;
            margin-right: 20px;
        }

        .checkin-match {
            color: #6c757d;
            display: inline;
        }

        .match-board {
            width: 500px;
            border-bottom: solid 1px #ccc;
            background-color: #fff;
            margin-bottom: 15px;
        }

        .card a:hover {
            background-color: #f0f8ff;
        }

        .card a {
            text-decoration: none;
            color: black;
        }

        .match-info {
            margin-top: 10px;
            margin-bottom: 10px;
            padding-left: 20px;
        }

        .userpage-pagination {
            margin-left: 50px;
            margin-top: 30px;
        }
    }

    @media (max-width: 479px) {
        .posted-match {
            color: #6c757d;
            display: inline;
            margin-right: 20px;
        }

        .checkin-match {
            color: #6c757d;
            display: inline;
        }

        .match-board {
            width: 300px;
            border-bottom: solid 1px #ccc;
            background-color: #fff;
            margin-bottom: 15px;
        }

        .card a:hover {
            background-color: #f0f8ff;
        }

        .card a {
            text-decoration: none;
            color: black;
        }

        .match-info {
            margin-top: 10px;
            margin-bottom: 10px;
            padding-left: 20px;
        }
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
                evaluations: '',
                page: 1,
                displayLists: [],
                pageSize: 5,
                length:0,
            }
        },
        methods: {
            fetchUser: function() {
                axios.get('/api/forUserIndex/' + this.user_id).then((res)=>{
                    this.user = res.data
                })

                axios.get('/api/forUserPost/' + this.user_id).then((res)=>{
                    this.posts = res.data
                    this.length = Math.ceil(this.posts.length/this.pageSize);
                    this.displayLists = this.posts.slice(0,this.pageSize);
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
            },
            pageChange(pageNumber) {
                this.displayLists = this.posts.slice(this.pageSize*(pageNumber -1), this.pageSize*(pageNumber));

            },
        },
        created(){
            this.fetchUser()
        },
    }
</script>
