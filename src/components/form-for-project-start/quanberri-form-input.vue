<template>
    <div class="field" data-type="text" @click="onClick">
        <span>{{ props.name }}</span>
        <input :name="props.formName" ref="input" type="text" v-model="field" :required="props.fieldRequired"
            v-maska="props.mask" />
        <p class="error">{{error}}</p>
    </div>
</template>

<script setup>
import { defineEmits, defineProps, computed, ref } from 'vue';
import { vMaska } from 'maska/vue';
const props = defineProps(['modelValue', 'name', 'formName', 'fieldRequired', 'mask','error'
]);
const emit = defineEmits(['update:modelValue']);
const input = ref();
const field = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

const onClick = () =>{
    input.value.focus();
}
</script>

<style src="./input-field-styles.scss" lang="scss"></style>