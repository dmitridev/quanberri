<template>
    <div class="mobile-field">
        <span>{{ props.name }}</span>
        <input type="text" :name="props.name" v-model="field" v-maska="props.mask" :data-maska-tokens="props.tokens"/>
        <p class="error">{{ props.error }}</p>
    </div>
</template>

<script setup>
import { defineEmits, defineProps, computed } from 'vue';
import { vMaska } from 'maska/vue';
const props = defineProps(['modelValue', 'name', 'formName', 'fieldRequired', 'error', 'mask','tokens']);
const emit = defineEmits(['update:modelValue']);
const field = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})
</script>

<style scoped lang="scss">
.mobile-field {

    display: flex;
    flex-flow: column;

    input {
        outline: none;
        background: transparent;
        border: 0;
        border-bottom: 1px solid white;
        font-size: 16px;
        color: white;
    }
}
</style>