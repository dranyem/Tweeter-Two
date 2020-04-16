<template>
    <div class="container">
     <div id="box1" class="animate">
         <div class="columns is-vcentered">

            <div class="column">
               <h1 class="title">Tweeter</h1>
                <h1 class="subtitle animate-reveal animate-second">See what’s happening in the world right now.</h1>
                <button class="button is-link is-rounded"><a href="/login">Login Now</a></button>
                <button class="button is-warning is-rounded"><a href="/register">Sign Up</a></button>
            </div>

            <div class="column">

              <img class="image" id="globe" src="https://media.giphy.com/media/8P1BugYCo5NB6GzJaR/giphy.gif" alt="">
              <img class="image" id="owl" src="https://media.giphy.com/media/Wsp3izMNQGVYA0yayA/giphy.gif" alt="">
            </div>
         </div>
     </div>

     <div  id="box2" class="animate">
        <div class="columns">
            <div class="column">
                <div class="box">
                    <h3>Connect with your friends and loved ones</h3>
                    <img src="https://bornrealist.com/wp-content/uploads/2017/09/social-media-connection-networking-technology-concept-48569758.jpg" alt="">
                </div>
            </div>
            <div class="column">
            <div class="box">
                    <h3>Stay updated with the world</h3>
                    <img src="https://i1.wp.com/my-thai.org/wp-content/uploads/update-3925895_1920.jpg?fit=1920%2C1114&ssl=1" alt="">
                </div>
            </div>
        </div>
        </div> 
     <div id="box3" class="animate">
        <div class="tile is-ancestor">
          <div class="tile is-vertical is-8">
            <div class="tile">
              <div class="tile is-parent is-vertical">
                <article class="tile is-child notification">
                  <p class="subtitle has-text-primary">Powered by:</p>
                  <img src="https://media.giphy.com/media/3o6gbbuLW76jkt8vIc/giphy.gif">
                </article>
                <article class="tile is-child notification">
                  <a class="title is-size-1 has-text-primary" href="/">
                      <span class="icon is-large">
                          <i class="fab fa-earlybirds"></i>
                      </span>
                      <span>Tweeter</span>
                  </a>
                </article>
              </div>
              <div class="tile is-parent">
                <article class="tile is-child notification">
                  <p class="title has-text-primary">Tweeter</p>
                  <p class="subtitle has-text-primary">Profile Card</p>
                  <figure class="image is-4by3">
                    <img src="/storage/b.png">
                  </figure>
                </article>
              </div>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child notification">
                <p class="title has-text-primary">Connect with us</p>
                <p class="subtitle has-text-primary">Follow our social pages!</p>
                <div class="content">
                  <a class="has-text-primary is-size-2" href="https://www.facebook.com">
                    <span class="icon is-large">
                        <i class="fab fa-facebook-square"></i>
                    </span>
                  </a>
                  <a class="has-text-primary is-size-2" href="https://www.instagram.com">
                    <span class="icon is-large">
                        <i class="fab fa-instagram-square"></i>
                    </span>
                  </a>
                  <a class="has-text-primary is-size-2" href="https://www.instagram.com">
                    <span class="icon is-large">
                        <i class="fab fa-youtube-square"></i>
                    </span>
                  </a>
                  <a class="has-text-primary is-size-2" href="https://www.instagram.com">
                    <span class="icon is-large">
                        <i class="fab fa-twitter-square"></i>
                    </span>
                  </a>
                </div>
              </article>
            </div>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child notification">
              <div class="content">
                <p class="title has-text-primary">About Us</p>
                <p class="subtitle has-text-primary">Create a better world!</p>
                <div class="content">
                  <p></p>
                </div>
              </div>
            </article>
          </div>
        </div>
            </div>
            </div>
  </div>
</template>

<script>
export default {
    name: 'Root',
}

$(document).ready(function(){
  var controller = new ScrollMagic.Controller();

  var sceneOne = new ScrollMagic.Scene({
    triggerElement: '#box1',
    triggerHook: 0.9,
		duration: "80%"
  })
  .setClassToggle('#box1', 'fade-in')
  .addTo(controller);
  var sceneOne = new ScrollMagic.Scene({
    triggerElement: '#box1',
    triggerHook: 0.9,
		duration: "80%"
  })
  .setClassToggle('#owl', 'fly')
  .addTo(controller);

  var sceneTwo = new ScrollMagic.Scene({
    triggerElement: '#box2',
    triggerHook: 0.9,
		duration: "80%"
  })
  .setClassToggle('#box2', 'fade-in')
  .addTo(controller);

  var sceneThree = new ScrollMagic.Scene({
    triggerElement: '#box3',
    triggerHook: 0.9,
		duration: "80%"
  })
  .setClassToggle('#box3', 'fade-in')
  .addTo(controller);
})
</script>

<style scoped>
#box1{
    height: 80vh;
}
#box2{
  padding-bottom: 300px;
}
#globe{
  padding-top: 100px;
  width: 250px;
}
#owl{
  width: 225px;
  position: relative;
  left: 50%;
  bottom: 375px;
  transition: 3s ease-out;
}
.fly{
  transform: translateX(-50%);
}
a,a:visited,a:hover,a:link{
  text-decoration: none;
  color: white;
}
.animate{
  transform: translateY(50px);
  transition: all 2s ease-out;
  opacity: 0;
}
.animate.fade-in{
  transform: translateY(0);
  opacity: 1;
}
</style>