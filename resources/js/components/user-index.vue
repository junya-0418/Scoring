<template>
<div>
    <div class="user-posts">
        <p>投稿した試合</p>
        <div class="post-card" v-for="post in posts" style="border: solid 1px #ccc; width: 400px">
            <div class="match-information">{{ post.match_type }} {{ post.home_team_name }} vs {{ post.away_team_name }}</div>
            <p style="font-size: 12px;">team</p>
            <div v-if="post.team_id === post.home_team_id" style="margin-bottom: 15px; float: left">
                {{ post.home_team_name }}
            </div>
            <div v-else style="margin-bottom: 15px; float: left">
                {{ post.away_team_name }}
            </div>
            <button style="margin-left: 17rem; margin-bottom: 10px; display: flex;" @click="openModal(post.posts_id)">詳細を見る</button>
        </div>
    </div>

        <div v-show="showContent" id="overlay-evaluation" v-on:click="closeModal">
            <div id="modal-window-evaluation"　v-on:click="stopEvent">

                <div v-for="evaluation in evaluations">
                    <div style="margin-bottom: 5px;">{{ evaluation.number }} {{ evaluation.name }} {{ evaluation.evaluation }}</div>
                    <div style="border-bottom: solid 1px #ccc; margin-bottom: 10px;">{{ evaluation.comment }}</div>
                </div>
                <button @click="closeModal" style="float: right">Close</button>


            </div>
        </div>
</div>

</template>

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
            openModal: function(id) {
                this.showContent = true

                axios.get('/api/forUserEvaluation/' + id).then((res)=>{
                    this.evaluations = res.data
                })

            },
            closeModal: function() {
                this.showContent = false
                this.evaluations = ''
            },
            stopEvent: function(){
                event.stopPropagation()
            }
        },
        created(){
            this.fetchUser()
        },
    }
</script>
