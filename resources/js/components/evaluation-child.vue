<template>
<div>
    <div class="mb-3" style="float: left">
        <label class="mr-3 cp_sl06_selectlabel" for="player_for_second_form" style="font-size: 12px">選手</label>
        <div class="cp_ipselect" style="width: 300px">
            <select class="cp_sl06" id="player_for_second_form" name="playersForEvaluation[]" style="width: 300px" v-model="selectedPlayer">
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
            <select class="cp_sl06" id="evaluation" name="evaluations[]" style="width: 70px; padding-left: 10px;" v-model="selectedNumber">
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
        <textarea name="comments[]" style=" width: 370px; height: 110px;"></textarea>
    </div>
</div>
</template>

<script>
    export default {
        props: ['players'],
        data() {
            return {
                selectedPlayer: '',
                selectedNumber: '',
                numbers: [1.0, 1.5, 2.0, 2.5, 3.0, 3.5, 4.0, 4.5, 5.0, 5.5, 6.0, 6.5, 7.0, 7.5, 8.0, 8.5, 9.0, 9.5]
            }
        }
    }
</script>
