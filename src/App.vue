<script lang="ts">
import { defineComponent } from "vue";
import FirstPage from "@/components/FirstPage.vue";
import PortfolioPage from "@/components/PortfolioPage.vue";

export default defineComponent({
  components: {
    FirstPage,
    PortfolioPage
  },
});
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
