<template>
    <template v-if="model && width > 900 && !formState.submitted">
        <quanberri-form-desktop @close="model = false" @submitForm="(state) => onSubmit('desktop', state)"
            :error="submitErrors.result" />
    </template>
    <template v-else-if="model && width < 900 && !formState.submitted">
        <quanberri-form-mobile @close="model = false" @submitForm="(state) => onSubmit('mobile', state)"
            :error="submitErrors.result" />
    </template>
    <template v-else-if="model && formState.submitted">
        <quanberri-form-success @close="model = false" />
    </template>
</template>
<script setup>

import { reactive, defineProps, computed, defineEmits } from 'vue';
import { useWindowSize } from '@vueuse/core';
import quanberriFormMobile from './mobile/quanberri-form-for-project-start-mobile.vue';
import quanberriFormDesktop from './desktop/quanberri-form-for-project-start-desktop.vue';
import quanberriFormSuccess from './success/form-success.vue';
import { FormValidator } from '@/utils/formValidator.js';
const formState = reactive({
    submitted: false,
    closed: false
})

const submitErrors = reactive({
    result: {
        name: '',
        email: '',
        phone: '',
        company: '',
        message: '',
        services: '',
        budget: '',
        file: '',
    }
});
const width = useWindowSize().width;
const emit = defineEmits(['update:modelValue'])

const props = defineProps(['modelValue']);
const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})


const onSubmit = async (type = "", state) => {
    const validator = new FormValidator(state);

    let result = {};
    let script = 'mail.php';
    switch (type) {
        case 'mobile':
            result = await validator.mobile();
            script = 'mobile-mail.php';
            break;
        case 'desktop':
            result = await validator.desktop();
            break;
    }
    console.log(result);
    submitErrors.result = Object.fromEntries(result.filter(e => !e.check.result).map(obj => ([[obj.key], obj.check.error])));
    if (submitErrors.result.length) {
        return;
    }

    const formData = new FormData();
    for (let [k, v] of Object.entries(state)) {
        formData.append(k, v);
    }
    try {
        const request = await fetch(script, {
            method: 'POST',
            body: formData
        })
        const response = await request.json();
        console.log(response);
        formState.submitted = true;

    } catch (e) {
        console.error(e);
    }
}

</script>

<style lang="scss" scoped>
$activeColor: rgb(255, 255, 255);
$unactiveColor: rgba(255, 255, 255, .5);

.form-wrapper {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 100vh;
    z-index: 99999;
    opacity: 0.9;
    color: white;
    top: 0;

    & .form-for-project-start {
        display: flex;
        justify-content: center;
        align-items: center;
        background: black;
        flex-direction: column;
        gap: 50px;
        padding: 50px 142px;
        max-width: 1450px;
        max-height: 1060px;

        & header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;

            & button {
                background: transparent;
                border: none;
            }
        }

        & h2 {
            font-size: 35px;
            line-height: 75px;
        }

        & strong {
            font-size: 32px;
            line-height: 75px;
        }
    }

    & .form-for-project-start .form-style {
        display: flex;
        flex-flow: row wrap;
        gap: 50px;
        justify-content: center;
    }
}

.field {
    max-width: 500px;
}

.field .check {
    width: 100%;
}

.column {
    display: flex;
    flex-flow: column;
    gap: 16px;
}

.column:nth-child(2) {
    max-width: 600px;

    & .field {
        max-width: 600px;
    }
}

.field[data-type="select"] {

    color: white;
    display: flex;

    & .choices {
        display: flex;
        row-gap: 30px;
        column-gap: 21px;
        flex-flow: row wrap;


        & span {
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 30px;
            padding: 5px;
            cursor: pointer;
            color: rgba(255, 255, 255, .5);
            font-size: 18px;
            padding: 11px;
            user-select: none;
        }

        & span.active {
            color: rgb(255, 255, 255);
            border: 1px solid rgb(255, 255, 255);
        }
    }
}

.field[data-type="file"] {
    .file-view {
        display: flex;
        flex-direction: row;
        gap: 20px;
        padding-bottom: 30px;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
    }

    & button {
        background: transparent;
        border: none;
    }

    & .hidden-description {
        color: rgba(255, 255, 255, .5);
    }

}

.field[data-type="checkbox"] {
    display: flex;
    flex-flow: row wrap;
    gap: 15px;

    & input {
        display: flex;
        width: 50px;
        height: 50px;
        border: 1px solid white;
        background: transparent;
    }

    & button.checkbox-view {
        display: flex;
        border: 1px solid white;
        width: 20px;
        height: 20px;
        background: transparent;

    }

    & a {
        color: white;
    }

}

.submit {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, .5);
    border-radius: 30px;
    padding: 10px;
    color: rgba(255, 255, 255, .5);
    font-size: 32px;
    max-width: 250px;
}

.submit.input_active {
    border: 1px solid white;
    color: white;
}

.form-submitted-message {
    max-width: 100%;
    max-height: 500px;
    background: black;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    padding: 5vw;
    gap: 30px;
}

.form-submitted-message img {
    max-width: 50%;
    margin: 0 auto;
}
</style>