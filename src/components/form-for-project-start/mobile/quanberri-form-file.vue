<template>
    <div class="mobile-field" data-type="file" ref="field_file">
        <div class="field-file__wrapper">
            <button class="file-upload-button" type="button" @click="native_html_file_field.click()">
                {{ file.name }}</button>
            <button class="file-delete-button" v-show="file.delete" type="button" @click="deleteFile">Удалить файл</button>
        </div>

        <input type="file" v-show="false" ref="native_html_file_field" @change="setFile" />
        <p class="error">{{ props.error }}</p>
    </div>
</template>

<script setup>
import { ref, reactive, computed, defineProps, defineEmits } from 'vue';
const native_html_file_field = ref();

const emit = defineEmits(['update:modelValue']);
const props = defineProps(['modelValue','error']);

const file = reactive({
    name: 'Добавить файл',
    delete: false,
    object: {},
    reset(){
        this.name = 'Добавить файл',
        this.delete = 'false',
        this.object = {};
    }
})

const field = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})



const setFile = (event) => {
    const [_file] = event.target.files;
    file.name = _file.name;
    file.delete = true;
    console.log(_file);
    file.object = _file;

    field.value = _file;
}

const deleteFile = () => {
    let dataTransfer = new DataTransfer();
    native_html_file_field.value.files = dataTransfer.files;
    file.reset();
    field.value = file;
}
</script>

<style lang="scss">
.field-file__wrapper {
    display: flex;
    gap: 10px;
    justify-content: space-between;
    width: 100%;

    .file-upload-button {
        background: #222222;
        border: 0;
        padding: 10px;
        color: white;
        border-radius: 10px;
    }

    .file-delete-button {
        background: transparent;
        border: none;
        padding: 10px;
        color: #606060;
    }
}
</style>