<template>
  <div>
      <giphy-button />
      <giphy-card :tweet-id="this.tweetId"/>
  </div>
</template>

<script>
import GiphyButton from './GiphyButton.vue';
import GiphyCard from './GiphyCard.vue'
export default {
    name: "Giphy",
    components: {
        GiphyButton,
        GiphyCard,
    },
    props: {
        tweetId: "",
    }
}
</script>

<style>

</style>
