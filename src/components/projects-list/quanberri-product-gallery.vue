<template>
    <div class="product-gallery" ref="product_gallery" :style="state.style">
        <div class="header">
            <span class="slides">
                {{ slide.index + 1 }} - {{ slideCount }}
            </span>
            <span>{{ props.name }}</span>
            <button @click="state.style='animation: closeGallery 1s forwards'; window.setTimeout(() => {state.style='';$emit('closeGallery')},1100);">
                Закрыть
            </button>
        </div>

        <Splide ref="splide_in_gallery" :options="{ type: loop, gap: 20, autoWidth: true }"
            @splide:moved="watchForCurrentSlide">
            <SplideSlide v-for="image in props.images" :key="image">
                <div class="product-img-slide"><img :src="image" /></div>
            </SplideSlide>
        </Splide>
    </div>
</template>

<script setup>
import { reactive, defineProps, defineEmits, ref, onMounted } from 'vue';

const props = defineProps(["images", "name"]);
defineEmits('closeGallery')
const slide = reactive({ index: 0 });
const state = reactive({style: ''});
let slideCount = 0;
const splide_in_gallery = ref();
onMounted(() => {
    slideCount = splide_in_gallery.value.splide.length;
});

function watchForCurrentSlide(_, index) {
    slide.index = index;
}
</script>
<style>
.product-gallery {
    padding-top: 40px;
}


.product-gallery {
    position: fixed;
    top: 100vh;
    left: 0;
    width: 100%;
    height: 100vh;
    display: none;
    background: rgb(36,0,0);
    transition: all 5s ease-in-out;
    animation: showGallery 1s forwards;
    border-radius:10px;
}

.product-gallery.clicked{
    display: flex;
    flex-direction: column;
    left: 0;
    top:20vh;
}

@keyframes showGallery{
    0%{
        top:100vh;
    }

    100%{
        top:20vh;
    }
}

@keyframes closeGallery{
    0%{
        top:20vh;
    }

    100%{
        top:100vh;
    }
}

.product-img-slide img {
  object-fit: contain;
  width: 1000px;
  border-radius:10px;
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
    font-size: 40px;
}
</style>