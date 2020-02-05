<template>
<div class="main">
    <div class="selectMatch">
        <select class="custom-select sources" id="match" name="match" v-model="selectedMatchType">
            <option v-for="type in matchTypes">
                {{ type }}
            </option>
        </select>
    </div>
    <div class="card board"  v-for="match in filteredMatches">
        <a class="match-card" href="javascript:void(0)" @click="goNext(match.id)">
            <div class="match">
                <div>{{ match.date }}</div>
                <div>{{ match.match_type }}</div>
                <div>{{ match.name }}</div>
                <div style="font-size: 16px;">{{ match.home_team_name }} vs {{ match.away_team_name }}</div>
                <div style="font-size: 14px;">{{ match.score }}</div>
            </div>
        </a>
    </div>
</div>
</template>

<style>

    @media (min-width: 767px) {
        .main {
            float: left;
            margin-bottom: 30px;
        }

        .selectMatch {

            margin-left: 100px;
            margin-bottom: 20px;
            width: 140px;

        }

        .board {
            width: 600px;
            margin-left: 100px;
            border-bottom: solid 1px #ccc;
            background-color: #fff;
            margin-bottom: 15px;

        }

        .match-card {

            color: black;
            /*padding-bottom: 10px;*/

        }

        .match {

            width: 600px;
            padding: 15px 30px;
            font-size: 12px;

        }
    }


    @media (max-width: 479px) {
        /*ウィンドウ幅が最大479pxまでの場合に適用*/
        .selectMatch{
            margin-bottom: 20px;
            width: 140px;
            margin-top: 15px;
        }

        .board {
            width: 350px;
            border-bottom: solid 1px #ccc;
            background-color: #fff;
            margin-bottom: 15px;
        }

        .match-card {

            color: black;
            /*padding-bottom: 10px;*/

        }

        .match {

            padding: 15px 30px;
            font-size: 12px;

        }
    }

    .card a:hover {
        background-color: #f0f8ff;
    }
    .btn-gradation {
        display: inline-block;
        text-align: left;
        background-image: linear-gradient(#eaeaea 0%, #c6c6c6 100%);
        box-shadow: inset 0 2px 0 rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.19);
        color: #a5a5a5;
        font-size: 16px;
        text-decoration: none;
        font-weight: bold;
        text-shadow: 1px 1px 1px rgba(255, 255, 255, 1);
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 16px;
    }

    .btn-gradation:hover {
        opacity: 0.8;
    }

    .custom-select-wrapper {
        position: relative;
        display: inline-block;
        user-select: none;
    }
    .custom-select-wrapper select {
        display: none;
    }
    .custom-select {
        position: relative;
        display: inline-block;
        /*font-size: 16px!important;*/
    }
    .custom-select-trigger {
        position: relative;
        display: block;
        width: 130px;
        padding: 0 84px 0 22px;
        font-size: 22px;
        font-weight: 300;
        color: #fff;
        line-height: 60px;
        background: #5c9cd8;
        border-radius: 4px;
        cursor: pointer;
    }
    .custom-select-trigger:after {
        position: absolute;
        display: block;
        content: '';
        width: 10px; height: 10px;
        top: 50%; right: 25px;
        margin-top: -3px;
        border-bottom: 1px solid #fff;
        border-right: 1px solid #fff;
        transform: rotate(45deg) translateY(-50%);
        transition: all .4s ease-in-out;
        transform-origin: 50% 0;
    }
    .custom-select.opened .custom-select-trigger:after {
        margin-top: 3px;
        transform: rotate(-135deg) translateY(-50%);
    }
    .custom-options {
        position: absolute;
        display: block;
        top: 100%; left: 0; right: 0;
        min-width: 100%;
        margin: 15px 0;
        border: 1px solid #b5b5b5;
        border-radius: 4px;
        box-sizing: border-box;
        box-shadow: 0 2px 1px rgba(0,0,0,.07);
        background: #fff;
        transition: all .4s ease-in-out;

        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transform: translateY(-15px);
    }
    .custom-select.opened .custom-options {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
        transform: translateY(0);
    }
    .custom-options:before {
        position: absolute;
        display: block;
        content: '';
        bottom: 100%; right: 25px;
        width: 7px; height: 7px;
        margin-bottom: -4px;
        border-top: 1px solid #b5b5b5;
        border-left: 1px solid #b5b5b5;
        background: #fff;
        transform: rotate(45deg);
        transition: all .4s ease-in-out;
    }
    .option-hover:before {
        background: #f9f9f9;
    }
    .custom-option {
        position: relative;
        display: block;
        padding: 0 22px;
        border-bottom: 1px solid #b5b5b5;
        font-size: 100%;
        font-weight: 600;
        color: #b5b5b5;
        line-height: 47px;
        cursor: pointer;
        transition: all .4s ease-in-out;
    }
    .custom-option:first-of-type {
        border-radius: 4px 4px 0 0;
    }
    .custom-option:last-of-type {
        border-bottom: 0;
        border-radius: 0 0 4px 4px;
    }
    .custom-option:hover,
    .custom-option.selection {
        background: #f9f9f9;
    }

</style>

<script>
    export default {
        data(){
            return {
                matches: [],
                selectedMatchType: 'J1 第1節',
                matchTypes: ['FUJI XEROX SUPER CUP','J1 第1節','J1 第2節','J1 第3節','J1 第4節','J1 第5節','J1 第6節','J1 第7節','J1 第8節','J1 第9節','J1 第10節']
            }
        },
        methods: {
            goNext: function (id) {
                location.href="/match/review/" + id;
            }
        },
        computed: {
            filteredMatches: function() {

                var matches = [];

                for(var i in this.matches) {

                    var match = this.matches[i];

                    if(match.match_type == this.selectedMatchType) {

                        matches.push(match);

                    }

                }

                return matches;

            }
        },
        mounted(){
            axios.get('/api/forsearch').then((res)=>{
                this.matches = res.data
            })
        },
    }
</script>


