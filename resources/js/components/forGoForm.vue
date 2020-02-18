<template>
<div>
    <div class="forGoFormButtonMain">
        <div>
            <button class="cp_btn3" @click="goForm">採点フォームへ進む</button>
        </div>
    </div>
</div>

</template>

<style>
    @media (min-width: 767px) {

        .forGoFormButtonMain {
            float: right;
            margin-top: 200px;
            margin-right: 30px;
        }

        button.cp_btn3 {
            position: relative;
            display: block;
            width: 210px;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: black;
            background: #87cefa;
            border-bottom: 2px solid #00838F;
            border-radius: 4px;
            box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.2), 0 2px 2px rgba(0, 0, 0, 0.19);
        }

        button.cp_btn3:active {
            border-bottom: 2px solid #26C6DA;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
        }
    }

    @media (max-width: 479px) {

    }

</style>

<script>

    export default {
        data(){
            return {
                match_id: location.href.split('/').pop(),
                judge: 1,
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
            goForm: function () {
                location.href = '/evaluation/form'
            }
        },
    }
</script>
