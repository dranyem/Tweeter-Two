<template>
  <button @click="showModal" class="button is-warning">Giphy</button>
</template>

<script>
export default {
    name: "GiphyButton",
    methods: {
        showModal(e){
            e.preventDefault();
            this.$root.$emit("showGiphy");
        },
    },
}
</script>

<style>

</style>
