<template>
    <div class="field">
        <block3 v-for="(block, index) in blocks"
               :key="index"
               :data="block"
        ></block3>
    </div>
</template>

<script>

    export default {
        props: ['data'],

        data() {
            return {
                blocks: this.data
            };
        },
        created() {

        }
    }
</script>

<style>
    .field {
        width:356px;
        height: 356px;
        border: 1px solid grey;
        margin: auto;
    }
</style>