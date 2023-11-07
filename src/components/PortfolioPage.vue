<template>
    <div class="first-container" id="aboutme">
      <div id="left-con">
        <h1>{{ currentPageDescription }}</h1>
      </div>
      <div id="right-con">
        <swiper ref="swiper">
          <swiper-slide v-for="page in pages" :key="page.id">
            <!-- Display page content here -->
            <div class="page-content">
              <h2>{{ page.title }}</h2>
              <p>{{ page.content }}</p>
            </div>
          </swiper-slide>
        </swiper>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Swiper from 'vue-awesome-swiper';
  import 'swiper/css/swiper.css';
  
  export default {
    data() {
      return {
        pages: [],
        currentPageDescription: 'Beskrivelse af siden',
      };
    },
    mounted() {
      this.fetchPages();
    },
    methods: {
      async fetchPages() {
        try {
          // Make an Axios request to fetch the list of folders and pageInfo.json content.
          const response = await axios.get('/api/getPages');
          this.pages = response.data;
        } catch (error) {
          console.error('Error fetching pages:', error);
        }
      },
      onSlideChange() {
        // Update the "Beskrivelse af siden" when the slide changes.
        const currentPage = this.$refs.swiper.swiper.realIndex;
        this.currentPageDescription = this.pages[currentPage].description;
      },
    },
    components: {
      Swiper,
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
    display: flex;
    align-items: center;

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


  #right-con {
    width: 100%;
    border-bottom: 8px solid $background-color;
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
}

.page-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
  text-align: center;
  /* Add any additional styles for the content displayed in the slider */
}
</style>