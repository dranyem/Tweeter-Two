<template>
    <div class="columns">
    <article class="media">
        <figure class="media-left">
            <p class="image is-32x32">
            <a :href="'/profile/view/'+userId">
                <img :src="'/storage/avatars/'+userAvatar">
            </a>
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
            <p>
                <a class="has-text-primary is-size-5" :href="'/profile/view/'+userId">
                    <strong>{{userFirstName}} {{userLastName}}</strong></a>
                    <a class="has-text-primary is-size-5" :href="'/profile/view/'+userId"><small><i>@ {{userUserName}}</i></small>
                </a>
                <br>
                <small>{{tweetDate}}</small>
                <br>
                <a class="has-text-black" :href="'/tweet/view/'+tweetId"> {{tweetContent}}</a>
            </p>
            </div>
            <nav class="level is-mobile">
            <div class="level-left">
                <div class="field level-item">
                    <span class="is-size-5 has-text-primary">{{this.count}}</span>
                    <span class="icon has-text-primary is-size-5 is-large">
                        <i class="fas fa-thumbs-up"></i>
                    </span>
                </div>
                <div class="field level-item">
                    <span class="is-size-5 has-text-primary">{{commentCount}}</span>
                    <span class="icon has-text-primary is-size-5 is-large">
                        <i class="fas fa-comment-dots"></i>
                    </span>
                </div>
                <tweet-unlike-button class="field level-item" :hidden="!this.isLiked" :tweetId="tweetId" />
                <tweet-like-button class="field level-item" :hidden="this.isLiked" :tweet-id="tweetId" />

            </div>
            </nav>
        </div>
    </article>
    <div class="column">
        <div class="level is-mobile">
            <div class="level-right">
                <div class="level-item">
                    <a class="button is-small is-success" :href="'/tweet/view/'+tweetId">
                    <span class="icon is-small"><i class="fas fa-eye"></i></span>
                    <span>View Tweet</span>
                    </a>
                </div>
                <div v-if="loggedInUser == userId" class="level-item">
                    <div >
                        <a class="button is-small is-warning" :href="'/tweet/edit?tweetId='+tweetId">
                            <span class="icon is-small"><i class="fas fa-edit"></i></span>
                            <span>Edit</span>
                        </a>
                    </div>
                    <div>
                        <a class="button is-small is-danger" :href="'/tweet/delete?tweetId='+tweetId">
                            <span class="icon is-small"><i class="fas fa-trash"></i></span>
                            <span>Delete</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
import TweetLikeButton from './TweetLikeButton.vue'
import TweetUnlikeButton from './TweetUnlikeButton'
export default {
    name: "BaseTweet",
    props: {
        tweetId: "",
        userAvatar: "",
        userId: "",
        userFirstName: "",
        userLastName: "",
        userUserName: "",
        tweetDate: "",
        tweetContent: "",
        likesCount: Number,
        commentCount: Number,
        loggedInUser: "",
        likesList: {
            type: Array,
        },
    },
    components: {
        TweetUnlikeButton,
        TweetLikeButton,
    },
    data (){
        return {
            isLiked: null,
            count: this.likesCount,
        }
    },
    mounted(){
        this.isLiked = this.likesList.includes(this.loggedInUser);
        this.$root.$on('tweetLiked', this.displayUnlikeButton);
        this.$root.$on('tweetUnliked', this.displayLikeButton);
    },
    methods: {
        displayLikeButton(id){
            if(this.tweetId==id){
                console.log("display like");
                 this.isLiked = !this.isLiked;
                 this.count--;
            }
        },
        displayUnlikeButton(id){
            if(this.tweetId==id){
                console.log("display unlike");
                this.isLiked = !this.isLiked;
                this.count++;
            }
        },
    },
}
</script>

<style>

</style>
