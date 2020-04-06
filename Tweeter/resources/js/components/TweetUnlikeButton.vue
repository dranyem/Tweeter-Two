<template>
  <a class="level-item button is-small is-danger" @click="unlike" >
        <span class="icon is-small"><i class="fas fa-thumbs-down"></i></span>
        <span>Unlike</span>
    </a>
</template>

<script>
export default {
    name: "TweetUnlikeButton",
    props: {
        tweetId: "",
    },
    methods: {
        unlike(){
             axios.post('/tweet/unlike',{
                tweetId: this.tweetId,
            })
            .then(response => {
                this.$root.$emit('tweetUnliked', this.tweetId);
                console.log("unliked");
            });
        },
    },
}
</script>

<style>

</style>
