<template>
<div style="float: right">
    <div class="card" style="margin-top: 58px; margin-right: 60px;">
            <div style="width: 250px; margin-left: 100px; background-color: #fff;">
                <div style="padding: 15px 30px 10px 30px;">
                    <p style="font-size: 12px;">第34節プレーヤーランキング</p>
                    <div style="font-size: 14px;  border-bottom: solid 1px #ccc; margin-bottom: 15px;" v-for="n in 5">
                        <div style="display: contents;"><strong>{{ n }}</strong>　{{ players[n - 1].name }}</div>
                        <div style="display: flex; float: right;"><strong>{{ players[n - 1].player_evaluation_average.toFixed(1) }}</strong></div>
                    </div>
                </div>
            </div>
    </div>
</div>
</template>

<style>
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
        font-size: 18px;
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
                players: [],
            }
        },
        mounted(){
            axios.get('/api/getPlayerRanking').then((res)=>{
                this.players = res.data
            })
        },
    }
</script>


