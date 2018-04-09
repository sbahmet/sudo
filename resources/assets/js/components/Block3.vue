<template>
    <div class="block3">
        <cell v-for="(cell, index) in block.cells"
              :data="cell"
              :key="block.id+'-'+index"
        ></cell>
    </div>
</template>

<script>

    export default {
        props: ['data'],

        data() {
            return {
                block: this.data
            };
        },
        created() {

        }
    }
</script>

<style>
    .block3 {
        width: 116px;
        height: 116px;
        border: 1px solid black;
    }
</style>