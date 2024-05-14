<template>
  <footer-desktop v-if="widthValue > 1280 " ></footer-desktop>
  <footer-tablet v-else-if="widthValue<=800 && widthValue > 414"></footer-tablet>
  <footer-mobile v-else-if="widthValue <= 414"></footer-mobile>
</template>

<script setup>
import FooterDesktop from "./footer-desktop.vue";
import FooterTablet from "./footer-tablet.vue";
import FooterMobile from "./footer-mobile.vue";
import { useWindowSize } from "@vueuse/core";
const {width} = useWindowSize();
const widthValue = width.value;
console.log(width);
</script>