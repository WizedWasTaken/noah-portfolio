<template>
  <div id="first-container">
    <div id="left-con">
      <h1>Portfolio</h1>
      <div class="img-con">
        <img
          src="@/assets/athlete-bodybuilder-with-beautiful-torso-isolated-white-background-naked-torso-african-american-man-posing-studio_397170-2039.png"
          alt=""
        />
      </div>
    </div>
    <div id="right-con">
      <h1>MY WORK</h1>
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
    border-bottom: 5px solid $background-color;
  }

  .img-con {
    position: sticky;
    z-index: 9999;
    width: 100%;
    border: 2px solid hotpink;
    margin-right: -20vw;
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: flex-end;

    img {
      width: 90%;
      aspect-ratio: 1 / 1;
      border-radius: 50%;
      box-shadow: 0 0 0 10px $background-color, 0 0 0 35px $secondary-color,
        0 0 0 45px $background-color;
    }
  }
}
</style>
