<template>
    <div class="product-gallery" ref="product_gallery" :style="state.style">
        <div class="header">
            <span class="slides">
                {{ slide.index + 1 }} - {{ slide.length }}
            </span>
            <span>{{ props.name }}</span>
            <button
                @click="state.style = 'animation: closeGallery 1s forwards'; window.setTimeout(() => { state.style = ''; $emit('closeGallery') }, 1100);">
                <img class="on-click-close-gallery" :src="CloseButton" />
            </button>
        </div>

        <div class="slider-images" v-if="width >= 800">
            <button ref="buttonLeft" @click="clickLeftButton" class="button-left splide__arrow--prev" title="left"
                style="opacity: 0.2">
                <img src="@/assets/images/buttons/circle-button-left.svg" alt="" />
            </button>
            <Splide ref="splide_in_gallery"
                :options="{ type: loop, gap: 120, autoWidth: true, focus: 'center', trimSpace: false, prev: '.slider-images .button-left', next: '.slider-images .button-right' }"
                @splide:moved="watchForCurrentSlide">
                <SplideSlide v-for="image in props.images" :key="image">
                    <div class="product-img-slide"><img :src="image" /></div>
                </SplideSlide>
            </Splide>
            <button ref="buttonRight" @click="clickRightButton" class="button-right splide__arrow--next" title="right">
                <img src="@/assets/images/buttons/circle-button-right.svg" alt="" />
            </button>
        </div>
        <div class="images" v-if="width < 800" style="height:webkit-max-available;overflow-y:scroll">
            <img class="product-mobile-img" v-for="image in props.images" :key="image" :src="image" alt="">
        </div>
    </div>
</template>

<script setup>
import CloseButton from '@/assets/images/buttons/button-close.svg';
import { reactive, defineProps, defineEmits, ref,/* onMounted, onUpdated*/ } from 'vue';
import { useWindowSize } from '@vueuse/core';

const width = reactive(useWindowSize().width.value);
const props = defineProps(["images", "name"]);
defineEmits('closeGallery');
const splide_in_gallery = ref();
const slide = reactive({ index: 0, length: props.images.length });
const state = reactive({ style: '' });

const buttonLeft = ref();
const buttonRight = ref();


function clickLeftButton() {
    if (splide_in_gallery.value) {
        splide_in_gallery.value.go('-1');
    }
}

function clickRightButton() {
    if (splide_in_gallery.value) {
        splide_in_gallery.value.go('+1');
    }
}

function watchForCurrentSlide(_, index) {
    slide.index = index;
    slide.length = props.images.length;

    if (!buttonLeft.value && !buttonRight.value)
        return;

    const activeSplide = splide_in_gallery.value;

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
.product-gallery {
    padding-top: 40px;
}

.product-mobile-img {
    width: 100%;
    padding: 30px;
}


.slider-images {
    position: relative;
}

.slider-images .button-left {
    position: absolute;
    top: 50%;
    left: 50px;
    z-index: 1000;
}

.slider-images .button-right {
    position: absolute;
    top: 50%;
    right: 50px;
    z-index: 1000;

}

.product-gallery {
    position: fixed;
    top: 100vh;
    left: 0;
    width: 100%;
    height: 100vh;
    display: none;
    background: black;
    transition: all 5s ease-in-out;
    animation: showGallery 1s forwards;
    border-radius: 10px;
}

.product-gallery.clicked {
    display: flex;
    flex-direction: column;
    left: 0;
    top: 20vh;
}

body:has(.product-gallery.clicked) {
    overflow: hidden;
}

@keyframes showGallery {
    0% {
        top: 100vh;
    }

    100% {
        top: 20vh;
    }
}

@keyframes closeGallery {
    0% {
        top: 20vh;
    }

    100% {
        top: 100vh;
    }
}

.product-img-slide img {
    object-fit: contain;
    max-width:700px;
}

.product-gallery .header {
    color: white;
    display: flex;
    justify-content: space-between;
    padding: 20px;
    font-size: 40px;
}

.product-gallery .header button {
    border: 0;
    background: transparent;
    color: white;
    font-size: 4vw;
}

.product-gallery .header button {
    font-size: unset;
}

.on-click-close-gallery {
    width: 3vw;
    height: 3vh;
}

@media screen and (max-width:800px) {
    .product-gallery .header {
        align-items: center;
        align-content: baseline;
        font-size: 3.5vw;
    }
}
</style>