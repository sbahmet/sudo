<template>
    <div class="cell">
        <div v-if="cell.val">
            {{ cell.val }}
        </div>
        <div v-else>
            <cand
                v-for="cand in [1,2,3,4,5,6,7,8,9]"
                :cand-val="cand"
                :class="{disabled: !cell.cands.includes(cand)}"
                :key="cell.id+'-'+cand"
            ></cand>
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
            console.log('cell created');
            console.log(this.data);
        }
    }
</script>

<style>
    .cell {
        width: 38px;
        height: 38px;
        border: 1px solid grey;
        font-size: 22px;
    }
</style>