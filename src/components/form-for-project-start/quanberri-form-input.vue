<template>
    <div class="field" data-type="text">
        <span>Имя и фамилия</span>
        <input name="name" type="text" v-model="field" />
        <p class="error"></p>
    </div>
</template>

<script setup>
import { defineEmits, defineProps, computed } from 'vue';
const props = defineProps(['modelValue']);
const emit = defineEmits(['update:modelValue']);
const field = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})
</script>

<style src="./input-field-styles.scss" lang="scss">

</style>