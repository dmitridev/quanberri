<template>
    <div class="field" data-type="text">
        <span>{{ props.name }}</span>
        <textarea :name="props.formName" id="" v-model="field"
            placeholder="Опишите задачу или загрузите описание ниже"></textarea>
        <p class="error"></p>
    </div>
</template>

<script setup>
import { defineEmits, defineProps, computed } from 'vue';
const props = defineProps(['modelValue','formName','name']);
const emit = defineEmits(['update:modelValue']);
const field = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})
</script>

<style src="./input-field-styles.scss" lang="scss">

</style>