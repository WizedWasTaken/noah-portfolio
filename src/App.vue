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
</style>
