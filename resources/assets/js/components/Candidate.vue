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
