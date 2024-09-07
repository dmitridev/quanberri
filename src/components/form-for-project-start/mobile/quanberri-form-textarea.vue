<template>
    <div class="mobile-field" data-type="text">
        <span>{{ props.name }}</span>
        <textarea :name="props.formName" id="" v-model="field" rows=4
            placeholder="Опишите задачу или загрузите описание ниже"></textarea>
        <p class="error">{{ props.error }}</p>
    </div>
</template>

<script setup>
import { defineEmits, defineProps, computed } from 'vue';
const props = defineProps(['modelValue','formName','name','error']);
const emit = defineEmits(['update:modelValue']);
const field = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})
</script>

<style lang="scss">
    .mobile-field{
        display:flex;
        flex-flow:column;
        width:100%;
        textarea{
            background:transparent;
            border:0;
            border-bottom:1px solid white;
            outline:none;
            color:white;
            
        }
    }
</style>
