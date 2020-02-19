<template>
<div>
    <div style="margin-top: 15px; margin-right: auto; width: 160px; margin-left: auto;">
        <div v-if="judge === 2">
            <button class="cp_btn" @click="loginAlert">観戦チェックイン</button>
        </div>
        <div v-if="judge === 1">
            <button class="cp_btn" @click="checkin">観戦チェックイン</button>
        </div>
        <div v-if="judge === 0">
            <button class="cp_btn2" @click="destroy">チェックイン済み</button>
        </div>
        <div style="font-size: 12px; float: right;">{{ counts }}人が観戦しました</div>
    </div>

    <div v-if="loading" class="load-wrapp-forReview">
        <div class="load-4-forReview">
            <div class="ring-1-forReview"></div>
        </div>
    </div>
</div>

</template>

<style>
    @media (min-width: 767px) {

        button.cp_btn {
            position: relative;
            display: block;
            width: 160px;
            padding: 4px;
            text-align: center;
            text-decoration: none;
            color: #FFF;
            background: #26C6DA;
            border-bottom: 2px solid #00838F;
            border-radius: 4px;
            box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.2), 0 2px 2px rgba(0, 0, 0, 0.19);
        }

        button.cp_btn:active {
            border-bottom: 2px solid #26C6DA;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
        }

        button.cp_btn2 {
            position: relative;
            display: block;
            width: 160px;
            padding: 4px;
            text-align: center;
            text-decoration: none;
            color: black;
            background: #CCC;
            border-bottom: 2px solid #00838F;
            border-radius: 4px;
            box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.2), 0 2px 2px rgba(0, 0, 0, 0.19);
        }

        button.cp_btn2:active {
            border-bottom: 2px solid #26C6DA;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
        }

        .ring-1-forReview {
            width: 10px;
            height: 10px;
            margin: 0 auto;
            padding: 10px;
            border: 7px dashed #4b9cdb;
            border-radius: 100%;
        }

        .load-4-forReview .ring-1-forReview {
            animation: loadingD 1.5s .3s cubic-bezier(.17, .37, .43, .67) infinite;
        }

        .load-wrapp-forReview {
            margin-left: auto;
            margin-right: auto;
            width: 550px;
            height: 100px;
            border-radius: 5px;
            text-align: center;
            position: absolute;
            z-index: 9999;
        }

        /*.load-wrapp-forReview p {padding: 0 0 20px;}*/
        /*.load-wrapp-forReview:last-child {margin-right: 0;}*/
        /* =Animate the stuff
    ------------------------ */
        @keyframes loadingD {
            0% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(180deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    }

    @media (max-width: 479px) {
        button.cp_btn {
            position: relative;
            display: block;
            width: 160px;
            padding: 4px;
            text-align: center;
            text-decoration: none;
            color: #FFF;
            background: #26C6DA;
            border-bottom: 2px solid #00838F;
            border-radius: 4px;
            box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.2), 0 2px 2px rgba(0, 0, 0, 0.19);
            margin-top: 15px;
        }

        button.cp_btn:active {
            border-bottom: 2px solid #26C6DA;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
        }

        button.cp_btn2 {
            position: relative;
            display: block;
            width: 160px;
            padding: 4px;
            text-align: center;
            text-decoration: none;
            color: black;
            background: #CCC;
            border-bottom: 2px solid #00838F;
            border-radius: 4px;
            box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.2), 0 2px 2px rgba(0, 0, 0, 0.19);
        }

        button.cp_btn2:active {
            border-bottom: 2px solid #26C6DA;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
        }

        .ring-1-forReview {
            width: 10px;
            height: 10px;
            margin: 0 auto;
            padding: 10px;
            border: 7px dashed #4b9cdb;
            border-radius: 100%;
        }

        .load-4-forReview .ring-1-forReview {
            animation: loadingD 1.5s .3s cubic-bezier(.17, .37, .43, .67) infinite;
        }

        .load-wrapp-forReview {
            margin-left: auto;
            margin-right: auto;
            width: 350px;
            height: 100px;
            border-radius: 5px;
            text-align: center;
            position: absolute;
            z-index: 9999;
        }

        /*.load-wrapp-forReview p {padding: 0 0 20px;}*/
        /*.load-wrapp-forReview:last-child {margin-right: 0;}*/
        /* =Animate the stuff
    ------------------------ */
        @keyframes loadingD {
            0% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(180deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    }

</style>

<script>

    export default {
        data(){
            return {
                match_id: location.href.split('/').pop(),
                counts: '',
                judge: 1,
                loading: true
            }
        },
        methods: {
            checkin: function() {
                var match_id = {
                    'match_id': this.match_id
                };
                axios.post('/api/checkin/store', match_id).then((res)=>{
                    this.counts = res.data
                })
                this.judge = 0
            },
            loginAlert: function () {
                alert('チェックインするにはログインを行ってください')
            },
            destroy: function () {
                var match_id = {
                    'match_id': this.match_id
                };
                axios.post('/api/checkin/destroy', match_id).then((res)=>{
                    this.counts = res.data
                })
                this.judge = 1
            }

        },
        mounted(){
            var match_id = {
                'match_id': this.match_id
            };
            axios.post('/api/getCounts', match_id).then((res)=>{
                this.counts = res.data
            }),
            axios.post('/api/judge', match_id).then((res)=>{
                this.judge = res.data
            })
            .finally(() => this.loading = false)
        },
    }
</script>
