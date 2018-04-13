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
        position: relative;
        left: 0%;
        top: 0%;

        transition: font-size 1s, color 1s, left 1s, top 1s;

    }

    .cand.disabled {
        text-decoration: line-through;
        color: silver;
        font-size:10px;
    }

    .cand.disabled.cand-hidden {
        color: transparent;
        font-size: 0;
    }

    .cand.cand-the-one {
        color: #295f46;
        font-size: 16px;
        position: absolute;
        left: 50%;
        top: 25%;
    }
</style>