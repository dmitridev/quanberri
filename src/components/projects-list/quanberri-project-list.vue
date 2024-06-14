<template>
  <div class="our-possibilities" id="projects">
    <div class="our-possibilities-header">
      <h2>Помогли запустить<br />&gt;50 продуктов</h2>
      <div class="buttons" v-show="widthValue > 414">
        <button ref="buttonLeft" @click="clickLeftButton" class="button-left splide__arrow--prev" title="left"
          style="opacity: 0.2">
          <img src="@/assets/images/buttons/circle-button-left.svg" alt="" />
        </button>
        <button ref="buttonRight" @click="clickRightButton" class="button-right splide__arrow--next" title="right">
          <img src="@/assets/images/buttons/circle-button-right.svg" alt="" />
        </button>
      </div>
    </div>
    <Splide ref="splideDesktop" v-if="widthValue > 414" @splide:moved="WatchForCurrentSlide" :options="{
      arrows: false,
      arrows: {
        prev: '.our-possibilities .button-left',
        next: '.our-possibilities .button-right',
      },
      autoScroll: {
        speed: 1,
      },
      pagination: false,
      gap: '20px',
    }" aria-label="Наши люди">
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Product1" name="Манжерок"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            @click="galleries[1] = !galleries[1]" :tags="['Дизайн', 'Сайты']"></quanberri-product>

          <quanberri-product width="590" height="472" id="product-3" :image="Product3" name="Бутик Alemon's"
            @click="galleries[2] = !galleries[2]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>

          <quanberri-product width="590" height="472" id="product-4" :image="Product4" name="Sova team"
            @click="galleries[3] = !galleries[3]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Product5" name="Манжерок"
            @click="galleries[4] = !galleries[4]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-1" :image="Product1" name="Манжерок"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            @click="galleries[1] = !galleries[1]" :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-3" :image="Product3" name="Бутик Alemon's"
            @click="galleries[2] = !galleries[2]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Product4" name="Sova team"
            @click="galleries[3] = !galleries[3]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Product5" name="Фонд Шарафа Рашидова"
            @click="galleries[4] = !galleries[4]" :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-3" :image="Product1" name="Манжерок"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Product2" name="Фонд Шарафа Рашидова"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты']"></quanberri-product>
        </div>
      </SplideSlide>
    </Splide>
    <Splide ref="splideMobile" v-else-if="widthValue <= 414"
      :options="{ type: 'loop', gap: '20px', arrows: false, pagination: false }">
      <SplideSlide>
        <quanberri-mobile-product id="product-1" :image="Product1" name="Манжерок"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-mobile-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-mobile-product id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
          :tags="['Дизайн', 'Сайты']"></quanberri-mobile-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-mobile-product id="product-3" :image="Product3" name="Бутик Alemon's"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-mobile-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-mobile-product id="product-4" :image="Product4" name="Sova team"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-mobile-product>
      </SplideSlide>
    </Splide>

    <quanberri-product-gallery :class="{ 'clicked': galleries[0] }" ref="products_gallery1" name="FRESCO" @closeGallery="galleries[0]=false"
      :images="[Product1_1, Product1_2, Product1_3, Product1_4, Product1_5]" />
    <quanberri-product-gallery :class="{ 'clicked': galleries[1] }" ref="products_gallery2" name="UXU" @closeGallery="galleries[1]=false"
      :images="[Product2_1, Product2_2, Product2_3, Product2_4, Product2_5, Product2_6, Product2_7]" />
    <quanberri-product-gallery :class="{ 'clicked': galleries[2] }" ref="products_gallery3" name="CAFEE" @closeGallery="galleries[2]=false"
      :images="[Product3_1, Product3_2, Product3_3, Product3_4, Product3_5, Product3_6, Product3_7]" />
    <quanberri-product-gallery :class="{ 'clicked': galleries[3] }" ref="products_gallery4" name="QUANBERRI" @closeGallery="galleries[3]=false"
      :images="[Product4_1, Product4_2, Product4_3, Product4_4, Product4_5, Product4_6]" />
    <quanberri-product-gallery :class="{ 'clicked': galleries[4] }" ref="products_gallery5" name="ATMOSPHERE" @closeGallery="galleries[4]=false"
      :images="[Product5_1, Product5_2, Product5_3, Product5_4, Product5_5, Product5_6]" />
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import { useWindowSize } from "@vueuse/core";
import quanberriProduct from "./quanberri-product.vue";
import QuanberriMobileProduct from './quanberri-mobile-product.vue';

import QuanberriProductGallery from './quanberri-product-gallery.vue';

import Product1 from "@/assets/images/product/Product-1-mini.webp";
import Product2 from "@/assets/images/product/Product-2-mini.webp";
import Product3 from "@/assets/images/product/Product-3-mini.webp";
import Product4 from "@/assets/images/product/Product-4-mini.webp";
import Product5 from "@/assets/images/product/Product-5-mini.webp";

import Product1_1 from "@/assets/images/product/Product1_1.webp";
import Product1_2 from "@/assets/images/product/Product1_2.webp";
import Product1_3 from "@/assets/images/product/Product1_3.webp";
import Product1_4 from "@/assets/images/product/Product1_4.webp";
import Product1_5 from "@/assets/images/product/Product1_5.webp";
import Product2_1 from "@/assets/images/product/Product2_1.webp";
import Product2_2 from "@/assets/images/product/Product2_2.webp";
import Product2_3 from "@/assets/images/product/Product2_3.webp";
import Product2_4 from "@/assets/images/product/Product2_4.webp";
import Product2_5 from "@/assets/images/product/Product2_5.webp";
import Product2_6 from "@/assets/images/product/Product2_6.webp";
import Product2_7 from "@/assets/images/product/Product2_7.webp";
import Product3_1 from "@/assets/images/product/Product3_1.webp";
import Product3_2 from "@/assets/images/product/Product3_2.webp";
import Product3_3 from "@/assets/images/product/Product3_3.webp";
import Product3_4 from "@/assets/images/product/Product3_4.webp";
import Product3_5 from "@/assets/images/product/Product3_5.webp";
import Product3_6 from "@/assets/images/product/Product3_6.webp";
import Product3_7 from "@/assets/images/product/Product3_7.webp";
import Product4_1 from "@/assets/images/product/Product4_1.webp";
import Product4_2 from "@/assets/images/product/Product4_2.webp";
import Product4_3 from "@/assets/images/product/Product4_3.webp";
import Product4_4 from "@/assets/images/product/Product4_4.webp";
import Product4_5 from "@/assets/images/product/Product4_5.webp";
import Product4_6 from "@/assets/images/product/Product4_6.webp";

import Product5_1 from "@/assets/images/product/Product5_1.webp";
import Product5_2 from "@/assets/images/product/Product5_2.webp";
import Product5_3 from "@/assets/images/product/Product5_3.webp";
import Product5_4 from "@/assets/images/product/Product5_4.webp";
import Product5_5 from "@/assets/images/product/Product5_5.webp";
import Product5_6 from "@/assets/images/product/Product5_6.webp";

import { ref } from "vue";


const galleries = reactive([
  false, false, false, false, false
])

const products_gallery1 = ref();
const products_gallery2 = ref();
const products_gallery3 = ref();
const products_gallery4 = ref();
const products_gallery5 = ref();

const { width } = useWindowSize();
const widthValue = width.value;

const splideDesktop = ref();
const splideMobile = ref();

const buttonLeft = ref();
const buttonRight = ref();


function clickLeftButton() {
  if (splideDesktop.value) splideDesktop.value.go("-1");
  if (splideMobile.value) splideMobile.value.go("-1");
}

function clickRightButton() {
  if (splideDesktop.value) splideDesktop.value.go("+1");
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

<style>

.product-list {
  display: flex;
  flex-flow: row wrap;
  justify-content: space-between;
  width: 100%;
  align-content: space-between;
  margin-bottom: 157px;
  row-gap: 20px;
}

@media screen and (max-width: 1280px) {
  .product-list {
    margin-bottom: 128px;
  }
}

@media screen and (max-width: 768px) {
  .product-list {
    margin-bottom: 128px;
  }
}

@media screen and (max-width: 414px) {
  .product-list {
    margin-bottom: 96px;
  }
}

@media screen and(max-width:360px) {
  .product-list {
    margin-bottom: 41px;
  }
}
</style>