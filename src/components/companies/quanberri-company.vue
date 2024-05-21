<template>
    <div class="company"><img :src="props.image" alt="" class="company-img"></div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps(['image']);
</script>

<style>
    .company-img{
        max-width:290px;
    }
</style>