<template>
    <div class="">
        <h1 class="title animate-reveal animate-first">Tweeter</h1>
        <h1 class="subtitle animate-reveal animate-second">See what’s happening in the world right now.</h1>
        <img class="globe" src="https://media.giphy.com/media/8P1BugYCo5NB6GzJaR/giphy.gif" alt="">
        <img class="owl" src="https://media.giphy.com/media/Wsp3izMNQGVYA0yayA/giphy.gif" alt="">
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
img{
  /* height: 50vh; */
}
.owl{
    width: 250px;
}
.globe{
    width: 250px;
}
h1{
    text-align: center;
    justify-self: center;
}
  .animate-reveal {
    font-family: Nunito;
    opacity: 0;
    animation: reveal 2s cubic-bezier(0, 1, 0.5, 1) 1 normal forwards;
  }

.animate-first {
    animation-delay: 1s;
}

.animate-second {
    animation-delay: 2s;
}
.animate-third {
    animation-delay: 3s;
}
@keyframes reveal {
  0% {
    opacity: 0;
    -webkit-transform: translateY(100%);
       -moz-transform: translateY(100%);
         -o-transform: translateY(100%);
            transform: translateY(100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
       -moz-transform: translateY(0);
         -o-transform: translateY(0);
            transform: translateY(0);
  }
}
</style>
