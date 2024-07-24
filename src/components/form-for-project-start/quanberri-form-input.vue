<template>
    <div class="field" data-type="text">
        <span>{{ props.name }}</span>
        <input :name="props.formName" type="text" v-model="field" />
        <p class="error"></p>
    </div>
</template>

<script setup>
import { defineEmits, defineProps, computed } from 'vue';
const props = defineProps(['modelValue','name','formName']);
const emit = defineEmits(['update:modelValue']);
const field = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})
</script>

<style src="./input-field-styles.scss" lang="scss">

</style>