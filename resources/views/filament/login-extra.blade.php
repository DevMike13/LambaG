{{-- @if (request()->is('ibroccogreens-admin/register'))
  <div class="illustration-wrapper">
    <img src="{{ asset('images/pana.png') }}" alt="" class="left-illustration-registration">
  </div>
@else
  <div class="illustration-wrapper">
    <img src="{{ asset('images/Illustration-1.png') }}" alt="" class="left-illustration-login">
  </div>
@endif --}}




<div class="illustration-wrapper">
  @if (request()->is('ibroccogreens-admin/register'))
      <img src="{{ asset('images/pana.png') }}" alt="" class="left-illustration-registration illustration-image">
  @else
    <div class="left-illustration-login illustration-image">
        <h1 class="login-heading">CAPISTRANO DISTILLERY</h1>
        <h2 class="login-subheading">LAMBAG</h2>
        <p>An IoT Web-based System for Real-Time Fermentation Monitoring and Alcohol Level Analysis with SMS Notification for Lambanog Production at Capistrano Distillery</p>
    </div>
  @endif

  @for ($i = 0; $i < 50; $i++)
      <img
          src="{{ asset('images/bubble.png') }}"
          class="bubble near-illustration"
          style="
              left: {{ rand(0, 100) }}%;
              animation-delay: {{ rand(0, 5000) / 1000 }}s;
              animation-duration: {{ rand(3000, 7000) / 1000 }}s;
              width: {{ rand(20, 50) }}px;
          "
      />
  @endfor
</div>



<style>
body {
    height: 100vh;
    overflow: hidden;
    background: linear-gradient(0deg, #e5e7eb 0%, rgba(229, 231, 235, 0) 100%) !important;
    position: relative;
}

.left-illustration-login,
.left-illustration-registration {
  display: none;
}



@media screen and (min-width: 1024px) {
    main {
      position: absolute; right: 100px;
    
    }
    .login-heading{
      font-size: 48px;
      font-weight: 700;
    }
    .login-subheading{
      font-size: 30px;
      font-weight: 700;
      margin-top: 50px;
    }
    .illustration-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 50%;
        height: 100vh;
        overflow: hidden;
        z-index: 1;
        pointer-events: none;
    }

    .illustration-image {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        height: auto;
        z-index: 2;
        pointer-events: auto;
    }

    .left-illustration-login,
    .left-illustration-registration {
        display: block;
        /* position: relative;
        width: 100%; */
        z-index: 2;
    }

    .bubble {
        position: absolute;
        bottom: -100px;
        animation: rise-bubble 5s linear infinite;
        opacity: 0.9;
        z-index: -1;
        pointer-events: none;
    }


}
  
.fi-simple-main{
  background-color: #6e8c80;
}

.bubble {
  position: absolute;
  bottom: -100px;
  width: 40px;
  animation: rise-bubble 5s linear infinite;
  z-index: -1;
  opacity: 0.9;
}

/* Additional clones for effect */
/* .broccoli::before,
.broccoli::after {
    content: '';
    background-image: url('{{ asset('images/broccoli.svg') }}');
    background-size: contain;
    background-repeat: no-repeat;
    position: absolute;
    width: 40px;
    height: 40px;
    opacity: 0.6;
    animation: drop-broccoli 7s linear infinite;
} */

/* Animation */
@keyframes rise-bubble {
    0% {
        transform: translateY(0px) rotate(0deg);
        opacity: 1;
    }
    100% {
        transform: translateY(-110vh) rotate(360deg);
        opacity: 0;
    }
}
</style>