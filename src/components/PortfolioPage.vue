<template>
    <div id="first-container">
      <div id="left-con">
        <h1>Beskrivelse</h1>
      </div>
      <div id="right-con">
        <div class="right-child">
          </div>
        </div>
      </div>
  </template>
  
  <script setup lang="ts">

  </script>
  
  <style lang="scss" scoped>
  #first-container {
    height: 100vh;
    display: flex;
  
    #left-con {
      width: 30vw;
      background-color: $background-color;
      color: $secondary-color;
      margin: 0;
      border-bottom: 8px solid white;
  
      h1,
      p {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 10%;
        width: 100%;
        margin: 0;
        text-align: center;
      }
    }
  
    nav {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        flex-wrap: wrap;
        height: 10vh;
        position: absolute;
        right: 0;
  
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
  
    #right-con {
      width: 100%;
      border-bottom: 8px solid $background-color;
    }
  
    @font-face {
      font-family: "trebuc";
      src: url("@/assets/fonts/trebuc.ttf") format("truetype");
    }
  
    .right-child {
      height: calc(100vh - 10vh - 8px);
      display: flex;
      align-items: center;
      justify-content: center;
  
      .vertical-sidebar {
        margin-right: -20vh;
        position: absolute;
        right: 0;
        top: 50%;
      }
  
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
      height: 80%;
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
  
        @media screen and (max-width: 800px) {
          box-shadow: 0 0 0 10px $background-color, 0 0 0 30px $secondary-color,
            0 0 0 40px $background-color;
        }
      }
    }
  }
  
  .blinking-cursor {
    font-size: 3rem;
    color: #2c3e50;
    -webkit-animation: 1s blink step-end infinite;
    -moz-animation: 1s blink step-end infinite;
    -ms-animation: 1s blink step-end infinite;
    -o-animation: 1s blink step-end infinite;
    animation: 1s blink step-end infinite;
  }
  @keyframes blink {
    from,
    to {
      color: transparent;
    }
    50% {
      color: #2c3e50;
    }
  }
  @-moz-keyframes blink {
    from,
    to {
      color: transparent;
    }
    50% {
      color: #2c3e50;
    }
  }
  @-webkit-keyframes blink {
    from,
    to {
      color: transparent;
    }
    50% {
      color: #2c3e50;
    }
  }
  @-ms-keyframes blink {
    from,
    to {
      color: transparent;
    }
    50% {
      color: #2c3e50;
    }
  }
  @-o-keyframes blink {
    from,
    to {
      color: transparent;
    }
    50% {
      color: #2c3e50;
    }
  }
  
  span {
    font-size: 2rem;
    cursor: default;
    user-select: none;
  }
  
  .vertical-sidebar {
    width: 60vh;
    color: $background-color;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: rotate(90deg);
    margin: 0;
  
    hr {
      width: 3rem;
      color: $background-color;
      margin: 0;
      margin-left: 2%;
    }
  
    h1 {
      margin: 0;
      padding: 0.5rem;
      border-radius: 5px;
    }
  }
  
  .icons svg {
    transform: rotate(-90deg);
    margin-left: 1rem;
    font-size: 2rem;
  }
  
  .icons a {
    text-decoration: none;
    color: $background-color;
  }
  </style>
  