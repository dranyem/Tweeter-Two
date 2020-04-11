<template>
    <div class="modal" :class="isActive? 'is-active':''">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title">Giphy</p>
            <button @click="closeModal" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <input @keydown.delete="emptyList" v-model="searchString" class="input is-primary" type="text" placeholder="Search Giphy...">
                <div class="imageContainer">
                    <img @click="giphySelected(item)" :class="selected(item)? 'selected':''" class="image" v-for="(item, index) in giphyList" :key="index" :src="item"/>
                </div>
            </section>
            <footer class="modal-card-foot">
            <button @click="postGiphy" class="button is-link">Post Giphy</button>
            <button @click="closeModal" class="button">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    name: "GiphyCard",
    props: {
        tweetId: "",
    },
    mounted(){
        this.$root.$on("showGiphy", this.displayCard);
    },
    methods: {
        displayCard(){
            this.isActive = true;
        },
        closeModal(e){
            e.preventDefault();
            this.isActive = false;
        },
        emptyList(){
            this.giphyList = [];
        },
        searchGiphy(){
            // e.preventDefault();
            const key = "i6AOFsK8DAf8q0a0pH8uHRZFJ2d288io";
            const limit = 50;
            const rating = "G";

            let url = "https://api.giphy.com/v1/gifs/search?api_key="+key+"&q="+this.searchString+"&limit="+limit+"&rating="+rating;
            axios.get(url)
            .then(response => {
                var root = this;
                for(var i=0; i<response.data.data.length;i++){
                    // console.log(response.data.data[i].images.fixed_width_small.url);
                    root.giphyList.push(response.data.data[i].images.fixed_width.url);
                }
            }).
            catch(error => {
                    console.log(error);
                    this.quote = 'Error';
            });

        },
        giphySelected(item){
            this.giphy = item;
        },
        selected(item){
            if(this.giphy==item){
                return true;
            } else {
                return false;
            }
        },
        postGiphy(){
             axios.post('/tweet/comment',{
                tweetId: this.tweetId,
                comment: this.giphy,
            })
            .then(response => {
                // this.$root.$emit('tweetLiked', this.tweetId);
                // console.log("liked");
            });
        },
    },
    watch: {
        searchString: function(){
            this.debouncedSearchGiphy();
        },
    },
    data(){
        return {
            isActive: false,
            searchString: "",
            giphyList: [],
            isSelected: false,
            giphy: "",

        }
    },
    created: function () {
        this.debouncedSearchGiphy = _.debounce(this.searchGiphy, 500)
    },
}
</script>

<style scoped>
    img{
        padding: 2.5px;
    }
    .selected{
        border: 3px solid red;
    }
    .imageContainer{
        display: grid;
        grid-template-columns:  repeat(3, 1fr);
    }
</style>
