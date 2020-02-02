<template>
<div>
    <div v-for="n in 14">
        <div class="mb-3" style="float: left">
            <label class="mr-3 cp_sl06_selectlabel" for="player_for_second_form" style="font-size: 12px">選手{{ n }}</label>
            <div class="cp_ipselect select-player">
                <select class="cp_sl06 select-player" id="player_for_second_form" name="playersForEvaluation[]" v-model="selectedPlayer['player' + n]">
                    <option v-for="player in players" v-bind:value="player.id">
                        {{ player.number }} {{ player.name }}
                    </option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
            </div>
        </div>

        <div class="mb-3" style="display: flow-root">
            <label class="mr-3 cp_sl06_selectlabel" for="evaluation" style="font-size: 12px">採点</label>
            <div class="cp_ipselect" style="width: 70px">
                <select class="cp_sl06" id="evaluation" name="evaluations[]" v-model="selectedNumber['number' + n]" style="width: 70px; padding-left: 10px;">
                    <option v-for="number in numbers">
                        {{ number.toFixed(1) }}
                    </option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <div>
                <label class="mr-3 cp_sl06_selectlabel" for="evaluation" style="font-size: 12px">コメント</label>
            </div>
            <textarea class="evaluation-form-textarea" name="comments[]" v-model="comments['comment' + n]"></textarea>
        </div>

    </div>

    <!--    エラー表示-->
    <div v-if="errors.length">
        <div v-for="error in errors" style="color: #dc143c;">
            {{ error }}
        </div>
    </div>

    <div class="evaluation-form-button" style="float: right;">
        <button class="button06" type="button"  style="margin-right: 50px; margin-top: 5px" v-on:click="$emit('backForm')">
            戻る
        </button>
        <button class="button06" type="submit"  style="margin-right: 50px; margin-top: 5px;" v-on:click="formCheck">
            送信
        </button>
    </div>


</div>
</template>

<style>
    @media (min-width: 767px) {
        .select-player {
            width: 300px;
        }

        .evaluation-form-textarea {
            width: 370px;
            height: 110px;
        }
    }

    @media (max-width: 479px) {
        .select-player {
            width: 200px;
        }

        .evaluation-form-textarea {
            width: 300px;
            height: 110px;
            font-size: 100%;
        }
    }


</style>

<script>
    export default {
        props: ['players'],
        data() {
            return {
                errors: [],
                selectedPlayer: {
                    player1: '',
                    player2: '',
                    player3: '',
                    player4: '',
                    player5: '',
                    player6: '',
                    player7: '',
                    player8: '',
                    player9: '',
                    player10: '',
                    player11: '',
                    player12: '',
                    player13: '',
                    player14: '',
                },
                selectedNumber: {
                    number1: '',
                    number2: '',
                    number3: '',
                    number4: '',
                    number5: '',
                    number6: '',
                    number7: '',
                    number8: '',
                    number9: '',
                    number10: '',
                    number11: '',
                    number12: '',
                    number13: '',
                    number14: '',
                },
                comments: {
                    comment1: '',
                    comment2: '',
                    comment3: '',
                    comment4: '',
                    comment5: '',
                    comment6: '',
                    comment7: '',
                    comment8: '',
                    comment9: '',
                    comment10: '',
                    comment11: '',
                    comment12: '',
                    comment13: '',
                    comment14: '',
                },
                numbers: [1.0, 1.5, 2.0, 2.5, 3.0, 3.5, 4.0, 4.5, 5.0, 5.5, 6.0, 6.5, 7.0, 7.5, 8.0, 8.5, 9.0, 9.5]
            }

            },
        methods: {
            formCheck: function (e) {

                if (window.confirm("入力内容を送信しますか？")) {

                    this.errors = []

                    for (var i = 1;  i < 15;  i++) {

                        if (this.selectedPlayer['player' + i]) {

                            if(!this.selectedNumber['number' + i]) {
                                this.errors.push('選手'+ i +'に未入力の項目があります');
                            } else if(this.comments['comment' + i] === '') {
                                this.errors.push('選手'+ i +'に未入力の項目があります');
                            }
                        }

                        if (this.selectedNumber['number' + i]) {

                            if(!this.selectedPlayer['player' + i]) {
                                this.errors.push('選手'+ i +'に未入力の項目があります');
                            } else if(this.comments['comment' + i] === '') {
                                this.errors.push('選手'+ i +'に未入力の項目があります');
                            }
                        }

                        if (this.comments['comment' + i]) {

                            if(!this.selectedPlayer['player' + i]) {
                                this.errors.push('選手'+ i +'に未入力の項目があります');
                            } else if(this.selectedNumber['number' + i] === '') {
                                this.errors.push('選手'+ i +'に未入力の項目があります');
                            }
                        }

                    }

                    // エラーの重複を排除
                    this.errors = this.errors.filter(function (x, i, self) {
                        return self.indexOf(x) === i;
                    });

                    if (this.errors.length) {
                        e.preventDefault();
                    }

                } else {
                    e.preventDefault();
                }
            }
        },
    }
</script>
