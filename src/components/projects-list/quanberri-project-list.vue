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
            @click="products_gallery1.classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            @click="products_gallery2.classList.toggle('clicked')" :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-3" :image="Product3" name="Бутик Alemon's"
            @click="products_gallery3.classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Product4" name="Sova team"
            @click="products_gallery4.classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Product1" name="Манжерок"
            @click="products.gallery[gallery1].classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            @click="products.gallery[1].classList.toggle('clicked')" :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-3" :image="Product3" name="Бутик Alemon's"
            @click="products.gallery[1].classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Product4" name="Sova team"
            @click="products.gallery[1].classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
        </div>
      </SplideSlide>
      <SplideSlide>
        <div class="product-list">
          <quanberri-product width="590" height="472" id="product-1" :image="Product1" name="Манжерок"
            @click="products.gallery[1].classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-2" :image="Product2" name="Фонд Шарафа Рашидова"
            @click="products.gallery[1].classList.toggle('clicked')" :tags="['Дизайн', 'Сайты']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-3" :image="Product3" name="Бутик Alemon's"
            @click="products.gallery[1].classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
          <quanberri-product width="590" height="472" id="product-4" :image="Product4" name="Sova team"
            @click="products.gallery[1].classList.toggle('clicked')"
            :tags="['Дизайн', 'Сайты', 'Брендинг']"></quanberri-product>
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

    <div class="product-gallery" ref="products_gallery1">

      <Splide :options={type:loop,gap:20,autoWidth:true}>
        <SplideSlide>
          <div class="product-img-slide"><img :src="Product1_1" /></div>

        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product1_2" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product1_3" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product1_4" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product1_5" /></div>
        </SplideSlide>

      </Splide>
    </div>

    <div class="product-gallery" ref="products_gallery2">
      <Splide :options={type:loop,gap:20,autoWidth:true}>
        <SplideSlide>
          <div class="product-img-slide"><img :src="Product2_1" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product2_2" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product2_3" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product2_4" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product2_5" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product2_6" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product2_7" /></div>
        </SplideSlide>

      </Splide>
    </div>

    <div class="product-gallery" ref="products_gallery3">
      <Splide :options={type:loop,gap:20,autoWidth:true}>
        <SplideSlide>
          <div class="product-img-slide"><img :src="Product3_1" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product3_2" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product3_3" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product3_4" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product3_5" /></div>
        </SplideSlide>


        <SplideSlide>
          <div class="product-img-slide"><img :src="Product3_6" /></div>
        </SplideSlide>


        <SplideSlide>
          <div class="product-img-slide"><img :src="Product3_7" /></div>
        </SplideSlide>
      </Splide>
    </div>

    <div class="product-gallery" ref="products_gallery4">
      <Splide :options={type:loop,gap:20,autoWidth:true}>
        <SplideSlide>
          <div class="product-img-slide"><img :src="Product4_1" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product4_2" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product4_3" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product4_4" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product4_5" /></div>
        </SplideSlide>


        <SplideSlide>
          <div class="product-img-slide"><img :src="Product4_6" /></div>
        </SplideSlide>
      </Splide>
    </div>

    <div class="product-gallery" ref="products_gallery5">
      <Splide :options={type:loop,gap:20,autoWidth:true}>
        <SplideSlide>
          <div class="product-img-slide"><img :src="Product5_1" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product5_2" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product5_3" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product5_4" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product5_5" /></div>
        </SplideSlide>

        <SplideSlide>
          <div class="product-img-slide"><img :src="Product5_6" /></div>
        </SplideSlide>
      </Splide>
    </div>
  </div>
</template>

<script setup>
import { useWindowSize } from "@vueuse/core";
import quanberriProduct from "./quanberri-product.vue";
import QuanberriMobileProduct from './quanberri-mobile-product.vue';
import Product1 from "@/assets/images/product/product-image-1.png";
import Product2 from "@/assets/images/product/product-image-2.png";
import Product3 from "@/assets/images/product/product-image-3.png";
import Product4 from "@/assets/images/product/product-image-4.png";

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

const products = {
  list: [Product1, Product2, Product3, Product4],
}

const products_gallery1 = ref();
const products_gallery2 = ref();
const products_gallery3 = ref();
const products_gallery4 = ref();


console.log(products);


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

.product-gallery{
  padding-top:120px;
}

.product-gallery {
  position: fixed;
  top: 100vh;
  left: 0;
  width: 100vw;
  height: 100vh;
  display: none;
  background:black;
}

.product-gallery.clicked {
  display: flex;
  top: 20vh;
  left: 0;
}

.product-img-slide img{
  object-fit:contain;
  width:1000px;
}

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