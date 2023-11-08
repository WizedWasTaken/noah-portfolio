<!-- @ts-nocheck -->
<template>
  <div id="portfolio" class="first-container">
    <div id="left-con">
      <h1>Projekt beskrivelse</h1>
      <p v-if="selectedProject && selectedProject.description">
        {{ selectedProject.description }}
      </p>
      <p v-else>Der er ingen beskrivelse tilgængelig for denne side.</p>
    </div>
    <div id="right-con">
      <div class="right-child">
        <swiper
          :navigation="true"
          class="mySwiper"
          :modules="modules"
          :loop="true"
          :pagination="{
            clickable: true,
          }"
          :autoplay="{
            delay: 4500,
            disableOnInteraction: false,
          }"
          @autoplayTimeLeft="onAutoplayTimeLeft"
          @slideChange="onSlideChange"
        >
          <swiper-slide v-if="projects.length === 0">
            <h2>Loading...</h2>
          </swiper-slide>

          <swiper-slide
            v-for="(project, index) in projects"
            :key="index"
            :data-history="index"
          >
            <a :href="project.name" target="_blank">
              <h2>{{ project.name }}</h2>
              <img
                :src="getProjectImage(project.name)"
                alt="Projekt Billede"
                class="project-image"
              />
            </a>
          </swiper-slide>

          <template #container-end>
            <div class="autoplay-progress">
              <svg viewBox="0 0 48 48" ref="progressCircle">
                <circle cx="24" cy="24" r="20"></circle>
              </svg>
              <span ref="progressContent"></span>
            </div>
          </template>
        </swiper>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
// @ts-nocheck
import { ref, onMounted } from "vue";
import { Autoplay, Pagination, Navigation, History } from "swiper/modules";
import { Swiper, SwiperSlide } from "swiper/vue";
import axios from "axios";

import "swiper/css/bundle";

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    const progressCircle = ref(null);
    const progressContent = ref(null);
    const projects = ref([]);
    const selectedProject = ref(null);

    const onAutoplayTimeLeft = (s: any, time: number, progress: number) => {
      progressCircle.value?.style.setProperty(
        "--progress",
        String(1 - progress)
      );
      progressContent.value!.textContent = `${Math.ceil(time / 1000)}s`;
    };

    const modules = [Autoplay, Pagination, Navigation, History];

    let siteInfoData = {}; // Define siteInfoData at a higher scope

    const fetchProjects = async () => {
      try {
        const response = await axios.get("readDirectory.php");
        console.log(response);
        const data = response.data;
        projects.value = data.projects;

        if ("siteInfo" in data) {
          siteInfoData = data.siteInfo; // Assign data.siteInfo to siteInfoData
          projects.value.forEach((project) => {
            const projectInfo = siteInfoData[project.name];
            if (projectInfo && projectInfo.description) {
              project.description = projectInfo.description;
            }
          });
        }
      } catch (error) {
        console.error("Error fetching project data: ", error);
      }
    };

    const onSlideChange = (swiper) => {
      const activeIndex = swiper.activeIndex;
      if (activeIndex >= 0 && activeIndex < projects.value.length) {
        selectedProject.value = projects.value[activeIndex];
      }
    };

    const getProjectImage = (projectName) => {
      const projectInfo = siteInfoData[projectName];
      return projectInfo && projectInfo.image
        ? projectInfo.image
        : "./assets/selfie.png";
    };

    onMounted(() => {
      fetchProjects();
    });

    return {
      onAutoplayTimeLeft,
      progressCircle,
      progressContent,
      projects,
      modules,
      onSlideChange,
      selectedProject,
      getProjectImage,
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
  }
}

.swiper {
  width: 70vw;
  height: 100%;
}

.swiper-container {
  width: 70vw;
  height: 60%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  height: 100%;
  width: 70vw;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.autoplay-progress {
  position: absolute;
  right: 16px;
  bottom: 16px;
  z-index: 10;
  width: 48px;
  height: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  color: var(--swiper-theme-color);
}

.autoplay-progress span {
  font-size: 1.5rem;
}

.autoplay-progress svg {
  --progress: 0;
  position: absolute;
  left: 0;
  top: 0px;
  z-index: 10;
  width: 100%;
  height: 100%;
  stroke-width: 4px;
  stroke: var(--swiper-theme-color);
  fill: none;
  stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
  stroke-dasharray: 125.6;
  transform: rotate(-90deg);
}
</style>
