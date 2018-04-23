<template>
    <div class="cell"
        :class="{
            'master-cell' : cell.isMaster,
            'current-cell': cell.isCurrent
        }"
    >
        <div v-if="cell.val" class="cell-val-wrap">
            {{ cell.val }}
        </div>
        <div v-else class="cands-wrap">
            <cand
                v-for="cand in [1,2,3,4,5,6,7,8,9]"
                :cand-val="cand"
                :class="{
                    disabled: !cell.cands.includes(cand),
                    'cand-the-one': cell.cands.length == 1 && cand == cell.cands[0],
                    'cand-hidden': cell.cands.length == 1 && cand!=cell.cands[0],
                }"
                :key="cell.id+'-'+cand"
            ></cand>
            <br>
        </div>
    </div>
</template>

<script>

    //  import cand from './Candidate.vue'

    export default {
        props: ['data'],

        data() {
            return {
                cell: this.data
            };
        },
        created() {

        }
    }
</script>

<style>
    .cell {
        width: 38px;
        height: 38px;
        border: 1px solid grey;
        font-size: 22px;
        float: left;
    }
    .cell-val-wrap {
        text-align: center;
    }
    .cands-wrap {
        position: relative;
    }
    .cell.master-cell {
        border: 1px solid #7d0000;
        border-radius: 4px;
    }

    .cell.current-cell {
        border: 1px solid #ff7632;
        background-color: #f1d9c4;
    }
</style>