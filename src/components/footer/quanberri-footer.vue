<template>
  <footer-desktop id="contacts" :links="links" v-if="widthValue > 1280 " ></footer-desktop>
  <footer-tablet id="contacts" :links="links" v-else-if="widthValue<=800 && widthValue > 414"></footer-tablet>
  <footer-mobile id="contacts" :links="links" v-else-if="widthValue <= 414"></footer-mobile>
</template>

<script setup>
import FooterDesktop from "./footer-desktop.vue";
import FooterTablet from "./footer-tablet.vue";
import FooterMobile from "./footer-mobile.vue";
import { useWindowSize } from "@vueuse/core";
const {width} = useWindowSize();
const widthValue = width.value;

const dprofile = "https://dprofile.ru/quanberri"
const bot = "https://t.me/QuanberriBot"
const vk = "https://vk.com/quanberri"

const links = {
  dprofile,
  bot,
  vk
}

</script>