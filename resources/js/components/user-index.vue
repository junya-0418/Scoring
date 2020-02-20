<template>
<div>

    <div class="user-posts">
        <div>
            <a href="javascript:void(0)" @click="goPosted" class="posted-match" v-bind:style="{ borderBottom: postedLine }">投稿した試合</a>
            <a href="javascript:void(0)" @click="goCheckin" class="checkin-match" v-bind:style="{ borderBottom: checkinLine }">観戦した試合</a>
        </div>

        <div v-bind:style="{ display: posted }" style="margin-top: 20px;">
            <div class="card match-board" v-for="post in displayListsPosts">
                <a class="match-card" href="javascript:void(0)" @click="goUserReview(post.posts_id)">
                    <div>
                        <div class="post-title"><strong>{{ post.title }}</strong></div>
                    </div>
                    <div class="match-info">
                        <div>{{ post.match_type }}</div>
                        <div>{{ post.home_team_name }} vs {{ post.away_team_name }}</div>
                        <span class="post-target-team">
                            <div class="post-targe-team-name" v-if="post.team_id === post.home_team_id">
                                {{ post.home_team_name }}
                            </div>
                            <div class="post-targe-team-name" v-else>
                                {{ post.away_team_name }}
                            </div>
                        </span>
                    </div>
                </a>
            </div>

            <div class="text-center">
                <paginate v-model="page" :page-count="lengthPosts"
                           :total-visible="5" @input="pageChangePosts" :container-class="'pagination'"
                          :page-class="'page-item'"></paginate>
            </div>

        </div>

        <div v-bind:style="{ display: checkin }" style="margin-top: 20px;">
            <div class="card match-board" v-for="usercheckin in displayListsCheckin">
                <a class="match-card" href="javascript:void(0)" @click="goMatch(usercheckin.match_id)">
                    <div class="checkin-matchtype">
                        {{ usercheckin.match_type }}
                    </div>
                    <div class="checkin-team">
                        {{ usercheckin.home_team_name }} vs {{ usercheckin.away_team_name }}
                    </div>
                </a>
            </div>

            <div class="text-center">
                <paginate v-model="page" :page-count="lengthCheckin"
                          :total-visible="5" @input="pageChangeCheckin" :container-class="'pagination'"
                          :page-class="'page-item'"></paginate>
            </div>
        </div>

    </div>

</div>

</template>

<style>

    @media (min-width: 767px) {
        .user-posts {
            width: 500px;
        }

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

        .post-title {
            margin: 15px;
            float: left;
        }

        .match-info {
            margin-top: 15px;
            margin-bottom: 10px;
            font-size: 10px;
            float: right;
            margin-right: 20px;
            width: 185px;
        }

        .checkin-matchtype {
            font-size: 12px;
            margin: 5px 0px 5px 10px;
        }

        .checkin-team {
            font-size: 12px;
            margin: 5px 0px 5px 10px;
        }

        .post-target-team {
            display: flex;
            padding-left: 20px;
            font-size: 10px;
            margin-top: 3px;
        }

        .post-targe-team-name {
            border: 1px solid rgb(204, 204, 204);
            border-radius: 1.25rem;
            padding: 3px;
        }

        .pagination {
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
            float: right;
        }

        .pagination > li:first-child > a {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination > .active > a {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #337ab7;
            border-color: #337ab7;
        }

        .pagination > li > a {
            position: relative;
            float: left;
            padding: 6px 12px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
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

        .post-title {
            margin: 15px;
            float: left;
        }

        .match-info {
            margin-bottom: 10px;
            font-size: 10px;
            float: right;
            width: 185px;
        }

        .checkin-matchtype {
            font-size: 10px;
            margin: 5px 0px 5px 10px;
        }

        .checkin-team {
            font-size: 10px;
            margin: 5px 0px 5px 10px;
        }

        .post-target-team {
            display: flex;
            padding-left: 20px;
            font-size: 10px;
            margin-top: 3px;
        }

        .post-targe-team-name {
            border: 1px solid rgb(204, 204, 204);
            border-radius: 1.25rem;
            padding: 3px;
        }

        .pagination {
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
            float: right;
        }

        .pagination > li:first-child > a {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination > .active > a {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #337ab7;
            border-color: #337ab7;
        }

        .pagination > li > a {
            position: relative;
            float: left;
            padding: 6px 12px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
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
                displayListsPosts: [],
                displayListsCheckin: [],
                pageSize: 5,
                lengthPosts:0,
                lengthCheckin:0,
            }
        },
        methods: {
            fetchUser: function() {
                axios.get('/api/forUserIndex/' + this.user_id).then((res)=>{
                    this.user = res.data
                })

                axios.get('/api/forUserPost/' + this.user_id).then((res)=>{
                    this.posts = res.data
                    this.lengthPosts = Math.ceil(this.posts.length/this.pageSize);
                    this.displayListsPosts = this.posts.slice(0,this.pageSize);
                })

                axios.get('/api/forUserCheckin/' + this.user_id).then((res)=>{
                    this.UserCheckins = res.data
                    this.lengthCheckin = Math.ceil(this.UserCheckins.length/this.pageSize);
                    this.displayListsCheckin = this.UserCheckins.slice(0,this.pageSize);
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
            pageChangePosts(pageNumber) {
                this.displayListsPosts = this.posts.slice(this.pageSize*(pageNumber -1), this.pageSize*(pageNumber));
            },
            pageChangeCheckin(pageNumber) {
                this.displayListsCheckin = this.UserCheckins.slice(this.pageSize*(pageNumber -1), this.pageSize*(pageNumber));

            },
        },
        created(){
            this.fetchUser()
        },
    }
</script>
