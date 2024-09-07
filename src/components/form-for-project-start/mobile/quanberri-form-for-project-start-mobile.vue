<template>
    <div class="form-wrapper">
        <div class="form-for-project-start-mobile">
            <header>
                <h2>Обсудить проект</h2>
                <button @click="emit('close')"><img src="@/assets/images/buttons/button-close.svg"></button>
            </header>
            <form class="form-style" name="form-for-project-start-mobile" ref="form_ref" @submit.prevent="emit('submitForm',state)">
                <quanberri-form-input formName="name" name="Имя и Фамилия" v-model="state.name" ref="field_name" :error="props.error?.name"
                    field-required />
                <quanberri-form-input formName="email" name="Электронная почта" v-model="state.email" ref="field_email" :error="props.error?.email"
                    field-required />
                <quanberri-form-input formName="phone" name="Телефон" v-model="state.phone" ref="field_phone" mask="+7(###) ###-##-##" :error="props.error?.phone"/>

                <quanberri-form-textarea formName="message" name="Сообщение" v-model="state.message" field-required :error="props.error?.message"
                    ref="field_message" />

                <quanberri-form-file formName="file" name="Добавить файл" v-model="state.file" field-required :error="props.error?.file"
                    ref="file_field" />
                <div class="field" data-type="checkbox" ref="field_confidential">
                    <input type="checkbox" name="confidential" v-show="false" v-model="state.submit_disabled">
                    <button type="button" class="checkbox-view" @click="state.submit_disabled = !state.submit_disabled">
                        <template v-if="state.submit_disabled == false">
                            <img class="check" src="@/assets/images/buttons/button-close.svg" alt="Подтверждение" />
                        </template>
                        <template v-else>

                        </template>
                    </button>
                    <p style="font-size:8px">Я прочитал <a href="#">политику обработки персональных данных</a> <br>и <a href="#">даю
                            согласие
                            на обработку своих данных</a>
                    </p>
                </div>

                <input :class="{ 'input_active': !state.submit_disabled, 'submit': true }" type="submit"
                    value="Отправить" :disabled="state.submit_disabled">
            </form>
        </div>
    </div>
</template>
<script setup>
import quanberriFormInput from './quanberri-form-input.vue'
import quanberriFormTextarea from './quanberri-form-textarea.vue';
import quanberriFormFile from './quanberri-form-file.vue';
import { defineEmits, reactive,defineProps } from 'vue';

const emit = defineEmits(['update:modelValue', 'close','submitForm'])
const props = defineProps(['error']);
const state = reactive({
    name: '',
    email: '',
    phone: '',
    message: '',
    file: {},
    submit_disabled: true
});
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

    & .form-for-project-start-mobile {
        display: flex;
        justify-content: center;
        align-items: center;
        background: black;
        flex-direction: column;
        gap: 50px;
        padding: 30px 72px;
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

            & img {
                width: 20px;
            }
        }

        & h2 {
            font-size: 20px;
            line-height: 75px;
        }

        & strong {
            font-size: 32px;
            line-height: 75px;
        }
    }

    & .form-for-project-start-mobile .form-style {
        display: flex;
        flex-flow: row wrap;
        gap: 30px;
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
    font-size: 20px;
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