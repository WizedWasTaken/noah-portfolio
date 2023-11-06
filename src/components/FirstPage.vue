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
        <h2>Mit <strong>Arbejde</strong></h2>
        <div>
          <span class="typed-text">{{ typeValue }}</span>
      <span class="blinking-cursor">|</span>
      <span class="cursor" :class="{ typing: typeStatus }">&nbsp;</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "typeWiriter",
  data: () => {
    return {
      typeValue: "",
      typeStatus: false,
      displayTextArray: ["FullStack Udvikler", "Freelancer", "Database Ekspert", "SEO Ekspert", "WordPress Udvikler"],
      typingSpeed: 100,
      erasingSpeed: 100,
      newTextDelay: 2000,
      displayTextArrayIndex: 0,
      charIndex: 0,
    };
  },
  props: {},
  created() {
    setTimeout(this.typeText, this.newTextDelay + 200);
  },
  methods: {
    typeText() {
      if (this.charIndex < this.displayTextArray[this.displayTextArrayIndex].length) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue += this.displayTextArray[this.displayTextArrayIndex].charAt(
          this.charIndex
        );
        this.charIndex += 1;
        setTimeout(this.typeText, this.typingSpeed);
      } else {
        this.typeStatus = false;
        setTimeout(this.eraseText, this.newTextDelay);
      }
    },
    eraseText() {
      if (this.charIndex > 0) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue = this.displayTextArray[this.displayTextArrayIndex].substring(
          0,
          this.charIndex - 1
        );
        this.charIndex -= 1;
        setTimeout(this.eraseText, this.erasingSpeed);
      } else {
        this.typeStatus = false;
        this.displayTextArrayIndex += 1;
        if (this.displayTextArrayIndex >= this.displayTextArray.length)
          this.displayTextArrayIndex = 0;
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
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
    flex-direction: column;
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
}
</style>
