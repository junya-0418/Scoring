<template>
<div>
    <nav class="global_menu">
    <ul class="list">
        <li  class="list-item">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="javascript:void(0)" @click="dropdown_show">チーム</a></li>
                <ul class="display-teams" v-if="active===true">
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
    @media (max-width: 479px) {
        .global_menu {
            border-bottom: solid 1px #ccc;
            height: 45px;
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
            margin-right: 120px;
            padding-left: 15px;
            display: grid;
            left: 60px;
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
            margin-left: 20px;
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
            font-size: 13px;
        }

    }
</style>

<script>

    import axios from 'axios';

    export default {
        data(){
            return {
                teams: [{name: '横浜FM', id: 21},
                    {name: 'FC東京', id: 22},
                    {name: '鹿島', id: 23},
                    {name: '川崎', id: 24},
                    {name: 'C大阪', id: 25},
                    {name: '広島', id: 26},
                    {name: 'G大阪', id: 27},
                    {name: '神戸', id: 28},
                    {name: '大分', id: 29},
                    {name: '札幌', id: 30},
                    {name: '仙台', id: 31},
                    {name: '清水', id: 32},
                    {name: '名古屋', id: 33},
                    {name: '浦和', id: 34},
                    {name: '鳥栖', id: 35},
                    {name: '湘南', id: 36},
                    {name: '柏', id: 37},
                    {name: '横浜FC', id: 38},
                ],
                active: false
            }
        },
        methods: {
            dropdown_show(){
                this.active = !this.active;
            },
            go_team_page(id) {
                location.href="/teams/" + id;
            }
        },
        // mounted() {
        //     axios.get('/api/getTeams').then((res)=>{
        //         this.teams = res.data
        //     })
        // }

    }
</script>
