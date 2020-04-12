<template>
<div class="container animate-first ">
  <div>
    <h1 class="title animate-reveal animate-first">Tweeter</h1>
    <h1 class="subtitle animate-reveal animate-second">See what’s happening in the world right now.</h1>
  </div>
  <div>
    <img src="/storage/bird.jpg" alt="">
  </div>

</div>
</template>

<script>
export default {

}
</script>

<style scoped>
/* .container{
    width: 90vw;
    height: 50vh;
} */
img{
  width: 500px;
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
