<template>
  <div class="companies">
    <div class="companies-header">
      <h2>Нам доверяют</h2>
      <div class="buttons" v-if="widthValue > 414">
        <button ref="buttonLeft" @click="clickLeftButton" class="button-left" style="opacity: 0.2">
          <img src="@/assets/images/buttons/circle-button-left.svg" alt="" />
        </button>
        <button ref="buttonRight" @click="clickRightButton" class="button-right">
          <img src="@/assets/images/buttons/circle-button-right.svg" alt="" />
        </button>
      </div>
    </div>
    <Splide ref="splideDesktop" :options="{ arrows: false, pagination: false, loop: true, gap: '20px' }"
      v-if="widthValue > 768" @splide:moved="WatchForCurrentSlide">
      <SplideSlide>
        <div class="companies-list">
          <quanberri-company :image="Company1"></quanberri-company>
          <quanberri-company :image="Company2"></quanberri-company>
          <quanberri-company :image="Company3"></quanberri-company>
          <quanberri-company :image="Company4"></quanberri-company>
          <quanberri-company :image="Company5"></quanberri-company>
          <quanberri-company :image="Company6"></quanberri-company>
          <quanberri-company :image="Company7"></quanberri-company>
          <quanberri-company :image="Company8"></quanberri-company>
          <quanberri-company :image="Company9"></quanberri-company>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="companies-list">
          <quanberri-company :image="Company10"></quanberri-company>
          <quanberri-company :image="Company11"></quanberri-company>
          <quanberri-company :image="Company12"></quanberri-company>
          <quanberri-company :image="Company13"></quanberri-company>
          <quanberri-company :image="Company14"></quanberri-company>
          <quanberri-company :image="Company15"></quanberri-company>
          <quanberri-company :image="Company16"></quanberri-company>
          <quanberri-company :image="Company17"></quanberri-company>
          <quanberri-company :image="Company18"></quanberri-company>
        </div>
      </SplideSlide>
    </Splide>

    <Splide ref="splideTab" :options="{ arrows: false, pagination: false, loop: true, perPage: 2, gap: '20px' }"
      v-else-if="widthValue <= 768 && widthValue > 414" @splide:moved="WatchForCurrentSlide">
      <SplideSlide>
        <div class="companies-list">
          <quanberri-company :image="Company1"></quanberri-company>
          <quanberri-company :image="Company2"></quanberri-company>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="companies-list">
          <quanberri-company :image="Company3"></quanberri-company>
          <quanberri-company :image="Company4"></quanberri-company>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="companies-list">
          <quanberri-company :image="Company5"></quanberri-company>
          <quanberri-company :image="Company6"></quanberri-company>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="companies-list">
          <quanberri-company :image="Company7"></quanberri-company>
          <quanberri-company :image="Company8"></quanberri-company>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="companies-list">
          <quanberri-company :image="Company9"></quanberri-company>
          <quanberri-company :image="Company10"></quanberri-company>
        </div>
      </SplideSlide>
    </Splide>

    <Splide ref="splideMobile" :options="{ arrows: false, pagination: false, perPage: 1, gap: '20px' }"
      v-else-if="widthValue <= 414" @splide:moved="WatchForCurrentSlide">
      <SplideSlide>
        <quanberri-company :image="Company1"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company2"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company3"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company4"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company5"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company6"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company7"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company8"></quanberri-company>
      </SplideSlide>
      <SplideSlide>
        <quanberri-company :image="Company9"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company10"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company11"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company12"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company13"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company14"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company15"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company16"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company17"></quanberri-company>
      </SplideSlide>
      
      <SplideSlide>
        <quanberri-company :image="Company18"></quanberri-company>
      </SplideSlide>
    </Splide>
  </div>
</template>

<script setup>
import quanberriCompany from "./quanberri-company.vue";
import Company1 from "@/assets/images/company/company-1.svg";
import Company2 from "@/assets/images/company/company-2.svg";
import Company3 from "@/assets/images/company/company-3.svg";
import Company4 from "@/assets/images/company/company-4.svg";
import Company5 from "@/assets/images/company/company-5.svg";
import Company6 from "@/assets/images/company/company-6.svg";
import Company7 from "@/assets/images/company/company-7.svg";
import Company8 from "@/assets/images/company/company-8.svg";
import Company9 from "@/assets/images/company/company-9.svg";
import Company10 from "@/assets/images/company/company-10.svg";
import Company11 from "@/assets/images/company/company-11.svg";
import Company12 from "@/assets/images/company/company-12.svg";
import Company13 from "@/assets/images/company/company-13.svg";
import Company14 from "@/assets/images/company/company-14.svg";
import Company15 from "@/assets/images/company/company-15.svg";
import Company16 from "@/assets/images/company/company-16.svg";
import Company17 from "@/assets/images/company/company-17.svg";
import Company18 from "@/assets/images/company/company-18.svg";

import { useWindowSize } from "@vueuse/core";
import { ref } from "vue";

const { width } = useWindowSize();
const widthValue = width.value;
const splideDesktop = ref();
const splideTab = ref();
const splideMobile = ref();

const buttonLeft = ref();
const buttonRight = ref();

function clickLeftButton() {
  if (splideDesktop.value) splideDesktop.value.go("-1");
  if (splideTab.value) splideTab.value.go("-1");
  if (splideMobile.value) splideMobile.value.go("-1");

}

function clickRightButton() {
  if (splideDesktop.value) splideDesktop.value.go("+1");
  if (splideTab.value) splideTab.value.go("+1");
  if (splideMobile.value) splideMobile.value.go("+1");
}

function WatchForCurrentSlide(_, index) {
  if (!buttonLeft.value && !buttonRight.value)
    return;

  const activeSplide =
    splideDesktop.value || splideMobile.value;

  if (index == 0) {
    buttonLeft.value.style = "opacity:0.2";
    buttonRight.value.style = "";
    return;
  } 
  
  if (index == activeSplide.splide.length - 1) {
    buttonRight.value.style = "opacity:0.2";
    buttonLeft.value.style = "";
    return;
  }

  buttonRight.value.style = "";
  buttonLeft.value.style = "";
}
</script>