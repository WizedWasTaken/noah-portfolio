<template>
  <div class="first-container scroll-snap-item">
    <div id="left-con">
      <h1>Portfolio</h1>
      <div class="img-con">
        <img src="@/assets/image-4(1).jpg" alt="" />
      </div>
      <p id="quote">
        When I wrote this code, only God and I understood what I did. Now only
        God knows.
      </p>
    </div>
    <div id="right-con">
      <nav>
        <a href="#aboutme">About Me</a>
        <a href="#portfolio">Portfolio</a>
        <a href="#github">Github</a>
      </nav>
      <div class="right-child">
        <div>
          <h2>Mit <strong>Arbejde</strong></h2>
          <span class="typed-text">{{ typeValue }}</span>
          <span class="blinking-cursor">|</span>
          <span class="cursor" :class="{ typing: typeStatus }">&nbsp;</span>
        </div>
        <div class="vertical-sidebar">
          <h1>Noah Nielsen</h1>
          <hr />
          <div class="icons">
            <a href="#linkedin">
              <v-icon name="fa-linkedin" scale="1.5" />
            </a>
            <a href="#discord">
              <v-icon name="fa-discord" scale="1.5" />
            </a>
            <a href="#github"> <v-icon name="fa-github" scale="1.5" /></a>
            <a href="#gmail">
              <v-icon name="fa-google" scale="1.5" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { ref, onMounted } from "vue";

export default {
  name: "FirstPage",
  setup() {
    const typeValue = ref("");
    const typeStatus = ref(false);
    const displayTextArray = [
      "FullStack Udvikler",
      "Freelancer",
      "Database Ekspert",
      "SEO Ekspert",
      "WordPress Udvikler",
      "JavaScript Ekspert",
    ];
    const typingSpeed = 100;
    const erasingSpeed = 100;
    const newTextDelay = 2000;
    let displayTextArrayIndex = 0;
    let charIndex = 0;

    const typeText = () => {
      if (charIndex < displayTextArray[displayTextArrayIndex].length) {
        if (!typeStatus.value) typeStatus.value = true;
        typeValue.value +=
          displayTextArray[displayTextArrayIndex].charAt(charIndex);
        charIndex += 1;
        setTimeout(typeText, typingSpeed);
      } else {
        typeStatus.value = false;
        setTimeout(eraseText, newTextDelay);
      }
    };

    const eraseText = () => {
      if (charIndex > 0) {
        if (!typeStatus.value) typeStatus.value = true;
        typeValue.value = displayTextArray[displayTextArrayIndex].substring(
          0,
          charIndex - 1
        );
        charIndex -= 1;
        setTimeout(eraseText, erasingSpeed);
      } else {
        typeStatus.value = false;
        displayTextArrayIndex += 1;
        if (displayTextArrayIndex >= displayTextArray.length)
          displayTextArrayIndex = 0;
        setTimeout(typeText, typingSpeed + 1000);
      }
    };

    onMounted(() => {
      setTimeout(typeText, newTextDelay + 200);
    });

    return {
      typeValue,
      typeStatus,
    };
  },
};
</script>

<style lang="scss" scoped>
.first-container {
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
