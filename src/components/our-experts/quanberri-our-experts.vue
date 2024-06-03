<template>
    <Splide :options="{
        autoWidth: true,
        type: 'loop',
        drag: 'free',
        arrows: false,
        autoScroll: {
            speed: 1,
        },
        pagination: false,
        gap: '20px'
    }" class="our-experts" :extensions="{AutoScroll}" aria-label="Наши люди">
        <SplideSlide>
            <div class="face">
                <img src="@/assets/images/face/face-1.jpg" alt="Daniele Buffa">
                <div class="explain">
                    <p>Danielle Buffa</p>
                    <p>Principal Designer</p>
                    
                </div>
            </div>
        </SplideSlide>
        <SplideSlide>
            <div class="face">
                <img src="@/assets/images/face/face-2.jpg" alt="Vladimir Gruev">
                <div class="explain">
                    <p>Vladimir Gruev</p>
                    <p>Digital Designer</p>
                    
                </div>
            </div>
        </SplideSlide>
        <SplideSlide>
            <div class="face">
                <img src="@/assets/images/face/face-3.jpg" alt="Сергей Бондаренко">
                <div class="explain">
                    <p>Сергей Бондаренко</p>
                    <p>Design Educator</p>
                    
                </div>
            </div>
        </SplideSlide>
        <SplideSlide>
            <div class="face">
                <img src="@/assets/images/face/face-4.jpg" alt="Владимир Хоменко">
                <div class="explain">
                    <p>Владимир Хоменко</p>
                    <p>Illustrator</p>
                    
                </div>
            </div>
        </SplideSlide>
        <SplideSlide>
            <div class="face">
                <img src="@/assets/images/face/face-5.jpg" alt="Victa Wille">
                <div class="explain">
                    <p>Victa Wille</p>
                    <p>Digital Designer</p>
                    
                </div>
            </div>
        </SplideSlide>
        <SplideSlide>
            <div class="face">
                <img src="@/assets/images/face/face-6.jpg" alt="София Ефименко">
                <div class="explain">
                    <p>София Ефименко</p>
                    <p>Brand Designer</p>
                    
                </div>
            </div>
        </SplideSlide>
    </Splide>
</template>

<script setup>
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
</script>