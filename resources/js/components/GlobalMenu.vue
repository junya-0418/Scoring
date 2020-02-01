<template>
<div>
    <nav class="global_menu">
    <ul class="list">
        <li  class="list-item">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#" @mouseenter="dropdown_show">チーム</a></li>
                <li class="contact"><a href="/contact">お問い合わせ</a></li>
                <ul class="display-teams" v-if="active===true" @mouseleave="dropdown_hide">
                    <li v-for="team in teams" class="sublist-item">
                        <a href="javascript:void(0)" @click="go_team_page(team.id)">{{team.name}}</a>
                    </li>
                </ul>
            </ul>
        </li>
    </ul>
    </nav>
</div>

</template>

<style>
    @media (min-width: 767px) {
        .global_menu {
            border-bottom: solid 1px #ccc;
            height: 45px;
            margin-bottom: 15px;
            z-index: 9999;
            margin-top: 10px;
            /*background-color: #f0ffff;;*/
        }

        .display-teams {
            border: solid 1px #ccc;
            margin-top: 5px;
            z-index: 1000;
            position: relative;
            background-color: #f0f8ff;
            margin-right: 150px;
        }

        .contact {

        }

        ul {
            padding: 0;
        }

        li {
            list-style: none;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        .list {
            padding: 0;
            margin-left: 250px;
        }

        .list-item a {
            position: relative;
            padding: 8px;
            /*border-bottom:solid 1px #ccc;*/
            margin-right: 3px;
        }

        .list-item a {
            display: block;
        }

        .list-item:last-of-type a {
            border-bottom: none;
        }

        .list-item > a::after {
            /*content:"▼";*/
            /*position: absolute;*/
            top: 12px;
            right: 10px;
            font-size: 12px;
        }

        .list-item > a.active::after {
            /*content:"▲";*/
        }

        .sublist-item {
            font-size: 11px;
        }
    }

</style>

<script>

    import axios from 'axios';

    export default {
        data(){
            return {
                teams:[],
                active: false
            }
        },
        methods: {
            dropdown_show(){
                this.active = true;
            },
            dropdown_hide(){
                this.active = false;
            },
            go_team_page(id) {
                location.href="/teams/" + id;
            }
        },
        mounted() {
            axios.get('/api/getTeams').then((res)=>{
                this.teams = res.data
            })
        }

    }
</script>
