<template>
    <div class="cand">{{ val }}</div>
</template>

<script>
    export default {
        props: ['candVal'],

        data(){
            return {
                val: this.candVal
            };
        }
    }
</script>

<style>
    .cand {
        float: left;
        font-family: Arial;
        font-size: 12px;
        line-height: 12px;
        width: 12px;
        height: 12px;
        text-align: center;
    }

    .cand.disabled {
        text-decoration: line-through;
        color: silver;
        font-size:10px;
    }
</style>