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
          <quanberri-product width="590" height="472" id="product-1" :image="Fresco_cropped" name="Производитель керамических изделий"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Atmosphere_cropped" name="Новый бренд event-пространства Atmosphere"
            @click="galleries[1] = !galleries[1]" :tags="['Дизайн', 'Сайты']"></quanberri-product>

          <quanberri-product width="590" height="472" id="product-3" :image="Caffe_cropped" name="CAFEE - новый формат кофейни"
            @click="galleries[2] = !galleries[2]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>

          <quanberri-product width="590" height="472" id="product-4" :image="Quanberri_cropped" name="Разработчик цифровых решений полного цикла"
            @click="galleries[3] = !galleries[3]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Uxu_cropped" name="Uxu"
            @click="galleries[4] = !galleries[4]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-1" :image="Fresco_cropped" name="Производитель керамических изделий"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Atmosphere_cropped" name="Новый бренд event-пространства Atmosphere"
            @click="galleries[1] = !galleries[1]" :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-3" :image="Caffe_cropped" name="CAFEE - новый формат кофейни"
            @click="galleries[2] = !galleries[2]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Quanberri_cropped" name="Разработчик цифровых решений полного цикла"
            @click="galleries[3] = !galleries[3]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Uxu_cropped" name="Uxu"
            @click="galleries[4] = !galleries[4]" :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-3" :image="Fresco_cropped" name="Производитель керамических изделий"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Atmosphere_cropped" name="Новый бренд event-пространства Atmosphere"
            @click="galleries[0] = !galleries[0]" :tags="['Дизайн', 'Сайты']"></quanberri-product>
        </div>
      </SplideSlide>
    </Splide>
    <Splide ref="splideMobile" v-else-if="widthValue <= 414"
      :options="{ type: 'loop', gap: '20px', arrows: false, pagination: false }">
      <SplideSlide>
        <quanberri-mobile-product id="product-1" :image="Fresco_cropped" name="Производитель керамических изделий"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"  @click="galleries[0] = !galleries[0]"></quanberri-mobile-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-mobile-product id="product-2" :image="Atmosphere_cropped" name="Новый бренд event-пространства Atmosphere"
          :tags="['Дизайн', 'Сайты']"  @click="galleries[1] = !galleries[1]"></quanberri-mobile-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-mobile-product id="product-3" :image="Caffe_cropped" name="CAFEE - новый формат кофейни"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"  @click="galleries[2] = !galleries[2]"></quanberri-mobile-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-mobile-product id="product-4" :image="Quanberri_cropped" name="Разработчик цифровых решений полного цикла"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"  @click="galleries[3] = !galleries[3]"></quanberri-mobile-product>
      </SplideSlide>
    </Splide>

    <quanberri-product-gallery :class="{ 'clicked': galleries[0] }" ref="products_gallery1" name="Производитель керамических изделий" @closeGallery="galleries[0]=false"
      :images="[Fresco_1, Fresco_2, Fresco_3, Fresco_4, Fresco_5]" />
    
      <quanberri-product-gallery :class="{ 'clicked': galleries[1] }" ref="products_gallery5" name="Новый бренд event-пространства Atmosphere" @closeGallery="galleries[1]=false"
      :images="[Atmosphere_1, Atmosphere_2, Atmosphere_3, Atmosphere_4, Atmosphere_5, Atmosphere_6]" />
    
      <quanberri-product-gallery :class="{ 'clicked': galleries[2] }" ref="products_gallery3" name="CAFEE - новый формат кофейни" @closeGallery="galleries[2]=false"
      :images="[Caffe_1, Caffe_2, Caffe_3, Caffe_4, Caffe_5, Caffe_6, Caffe_7]" />
    <quanberri-product-gallery :class="{ 'clicked': galleries[3] }" ref="products_gallery4" name="Разработчик цифровых решений полного цикла" @closeGallery="galleries[3]=false"
      :images="[Quanberri_1, Quanberri_2, Quanberri_3, Quanberri_4, Quanberri_5, Quanberri_6]" />
    
    
      <quanberri-product-gallery :class="{ 'clicked': galleries[4] }" ref="products_gallery2" name="UXU" @closeGallery="galleries[4]=false"
      :images="[Uxu_1, Uxu_2, Uxu_3, Uxu_4, Uxu_5, Uxu_6]" />
  
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import { useWindowSize } from "@vueuse/core";
import quanberriProduct from "./quanberri-product.vue";
import QuanberriMobileProduct from './quanberri-mobile-product.vue';

import QuanberriProductGallery from './quanberri-product-gallery.vue';

import Fresco_cropped from "@/assets/images/product/Fresco_0_cropped.webp";
import Atmosphere_cropped from "@/assets/images/product/Atmosphere_5_cropped.webp";
import Caffe_cropped from "@/assets/images/product/Caffe_0_cropped.webp";
import Quanberri_cropped from "@/assets/images/product/Quanberri_0_cropped.webp";
import Uxu_cropped from "@/assets/images/product/Uxu_5_cropped.webp";

import Fresco_1 from "@/assets/images/product/Fresco_0.webp";
import Fresco_2 from "@/assets/images/product/Fresco_1.webp";
import Fresco_3 from "@/assets/images/product/Fresco_2.webp";
import Fresco_4 from "@/assets/images/product/Fresco_3.webp";
import Fresco_5 from "@/assets/images/product/Fresco_4.webp";
import Atmosphere_1 from "@/assets/images/product/Atmosphere_0.webp";
import Atmosphere_2 from "@/assets/images/product/Atmosphere_1.webp";
import Atmosphere_3 from "@/assets/images/product/Atmosphere_2.webp";
import Atmosphere_4 from "@/assets/images/product/Atmosphere_3.webp";
import Atmosphere_5 from "@/assets/images/product/Atmosphere_4.webp";
import Atmosphere_6 from "@/assets/images/product/Atmosphere_5.webp";
import Caffe_1 from "@/assets/images/product/Caffe_0.webp";
import Caffe_2 from "@/assets/images/product/Caffe_1.webp";
import Caffe_3 from "@/assets/images/product/Caffe_2.webp";
import Caffe_4 from "@/assets/images/product/Caffe_3.webp";
import Caffe_5 from "@/assets/images/product/Caffe_4.webp";
import Caffe_6 from "@/assets/images/product/Caffe_5.webp";
import Caffe_7 from "@/assets/images/product/Caffe_6.webp";
import Quanberri_1 from "@/assets/images/product/Quanberri_0.webp";
import Quanberri_2 from "@/assets/images/product/Quanberri_1.webp";
import Quanberri_3 from "@/assets/images/product/Quanberri_2.webp";
import Quanberri_4 from "@/assets/images/product/Quanberri_3.webp";
import Quanberri_5 from "@/assets/images/product/Quanberri_4.webp";
import Quanberri_6 from "@/assets/images/product/Quanberri_5.webp";

import Uxu_1 from "@/assets/images/product/Uxu_1.webp";
import Uxu_2 from "@/assets/images/product/Uxu_2.webp";
import Uxu_3 from "@/assets/images/product/Uxu_3.webp";
import Uxu_4 from "@/assets/images/product/Uxu_4.webp";
import Uxu_5 from "@/assets/images/product/Uxu_5.webp";
import Uxu_6 from "@/assets/images/product/Uxu_6.webp";

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