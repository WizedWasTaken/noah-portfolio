<script lang="ts">
import { defineComponent } from "vue";
import FirstPage from "./components/FirstPage.vue";

export default defineComponent({
  components: {
    FirstPage,
  },
});
</script>

<template>
  <FirstPage />
</template>

<style lang="scss">
body {
  margin: 0;
  padding: 0;
}
</style>
