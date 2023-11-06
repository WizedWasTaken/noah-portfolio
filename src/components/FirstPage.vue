<template>
  <div id="first-container">
    <div id="left-con">
      <h1>Portfolio</h1>
      <div class="img-con">
        <img
          src="@/assets/selfie.png"
          alt=""
        />
      </div>
      <p id="quote">When I wrote this code, only God and I understood what I did. Now only God knows.</p>
    </div>
    <div id="right-con">
      <nav>
        <a href="#aboutme">About Me</a>
        <a href="#portfolio">Portfolio</a>
        <a href="#github">Github</a>
      </nav>
      <div class="right-child">
        <h2>My <strong>Work</strong></h2>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts"></script>

<style lang="scss" scoped>
#first-container {
  height: 100vh;
  display: flex;

  #left-con {
    width: 30vw;
    background-color: $background-color;
    text-align: center;
    color: $secondary-color;
  }

  #right-con {
    width: 100%;
    border-bottom: 8px solid $background-color;

    nav {
      width: 100%;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      flex-wrap: wrap;
      height: 10vh;

      a {
        padding: 1rem 1.5rem;
        text-decoration: none;
        color: gray;
        text-transform: uppercase;
        border-radius: 25%;
        transition: 250ms;

        &:hover {
          color: black;
        }
      }
    }
  }

  @font-face {
  font-family: 'trebuc';
  src: url('@/assets/fonts/trebuc.ttf') format('truetype');
}

  .right-child {
    height: calc(100vh - 10vh - 8px);
    display: flex;
    align-items: center;
    justify-content: center;

    h2 {
      margin: 0;
      font-family: trebuc;
      font-size: 6rem;
      text-transform: uppercase;
      
      strong {
        color: $background-color;
      }
    }
  }

  .img-con {
    position: sticky;
    z-index: 9999;
    margin-left: 2vw;
    width: 100%;
    height: 75vh;
    display: flex;
    align-items: center;
    justify-content: flex-end;

    img {
      width: 85%;
      aspect-ratio: 1 / 1;
      outline: transparent;
      border: transparent;
      border-radius: 50%;
      box-shadow: 0 0 0 15px $background-color, 0 0 0 60px $secondary-color,
        0 0 0 70px $background-color;

        @media screen and (max-width: 800px) 
        {
          box-shadow: 0 0 0 10px $background-color, 0 0 0 30px $secondary-color,
        0 0 0 40px $background-color;
        }
    }
  }
}
</style>
