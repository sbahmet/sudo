<template>
    <div class="row-selector row-1"></div>
</template>

<script>

    export default {
        props: ['data'],

        data() {
            return {
                blocks: this.data
            };
        },
        computed: {
            masterCell() {
                this.blocks.forEach((block) => {
                    block.cells.forEach(cell => {
                        if (cell.isMaster) {
                            return cell;
                        }
                    });
                });
            }
        },
        created() {

        }
    }
</script>

<style>
    .row-selector {
        border: 2px solid #f30404;
        border-radius: 8px;
        position: absolute;
        width: 358px;
        height: 44px;
        left: -2px;
    }

    .row-selector.row-0 {
        top: -2px;
    }
    .row-selector.row-1 {
        top: 37px;
    }
    .row-selector.row-2 {
        top: 75px;
    }
    .row-selector.row-3 {
        top: 116px;
    }
    .row-selector.row-4 {
        top: 155px;
    }
    .row-selector.row-5 {
        top: 193px;
    }
    .row-selector.row-6 {
        top: 234px;
    }
    .row-selector.row-7 {
        top: 273px;
    }
    .row-selector.row-8 {
        top: 312px;
    }

</style>