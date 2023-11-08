<script lang="ts">
// @ts-ignore
import FirstPage from "@/components/FirstPage.vue";
// @ts-ignore
import PortfolioPage from "@/components/PortfolioPage.vue";

export default {
  components: {
    FirstPage,
    PortfolioPage,
  },
};
</script>

<template>
  <FirstPage />
  <PortfolioPage />
</template>

<style lang="scss">
body {
  margin: 0;
  padding: 0;
}

* {
  scroll-behavior: smooth;
}

/* ===== Scrollbar CSS ===== */
/* Firefox */
* {
  scrollbar-width: thin;
  scrollbar-color: $background-color #ffffff;
}

/* Chrome, Edge, and Safari */
*::-webkit-scrollbar {
  width: 6px;
}

*::-webkit-scrollbar-track {
  background: #ffffff;
}

*::-webkit-scrollbar-thumb {
  background-color: $background-color;
  border-radius: 10px;
  border: 0px solid #ffffff;
}
</style>
