<template>
    <div id="first-container">
      <div id="left-con">
        <h1>Beskrivelse</h1>
      </div>
      <div id="right-con">
        <swiper
          :modules="swiperModules"
        >
          <swiper-slide v-for="(slide, index) in slides" :key="index">
            {{ slide }}
          </swiper-slide>
        </swiper>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import { Swiper, SwiperSlide } from 'swiper/vue';
  import 'swiper/css';
  
  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    data() {
      return {
        slides: ['Slide 1', 'Slide 2', 'Slide 3'],
      };
    },
  };
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
      width: 70vw;
      border-bottom: 8px solid $background-color;
    }
  
    @font-face {
      font-family: "trebuc";
      src: url("@/assets/fonts/trebuc.ttf") format("truetype");
    }
  }
  </style>
  