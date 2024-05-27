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
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="757" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="757" id="product-3" :image="Product3" name="Бутик Alemon's"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Product4" name="Sova team"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Product1" name="Манжерок"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="757" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="757" id="product-3" :image="Product3" name="Бутик Alemon's"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Product4" name="Sova team"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Product1" name="Манжерок"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="757" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="757" id="product-3" :image="Product3" name="Бутик Alemon's"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Product4" name="Sova team"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
    </Splide>
    <Splide ref="splideMobile" v-else-if="widthValue <= 414"
      :options="{ type: 'loop', gap: '20px', arrows: false, pagination: false }">
      <SplideSlide>
        <quanberri-product id="product-1" :image="Product1" name="Манжерок"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-product id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
          :tags="['Дизайн', 'Сайты']"></quanberri-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-product id="product-3" :image="Product3" name="Бутик Alemon's"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
      </SplideSlide>
      <SplideSlide>
        <quanberri-product id="product-4" :image="Product4" name="Sova team"
          :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
      </SplideSlide>
    </Splide>
  </div>
</template>

<script setup>
import { useWindowSize } from "@vueuse/core";
import quanberriProduct from "./quanberri-product.vue";
import Product1 from "@/assets/images/product/product-image-1.jpg";
import Product2 from "@/assets/images/product/product-image-2.jpg";
import Product3 from "@/assets/images/product/product-image-3.jpg";
import Product4 from "@/assets/images/product/product-image-4.jpg";
import { ref } from "vue";
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
  width: 100%;
  display: grid;
  grid-template-rows: 45% 20% 45%;
  grid-template-columns: 45% 45%;
  gap: 20px;

  justify-content: space-between;
  margin-bottom: 157px;
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