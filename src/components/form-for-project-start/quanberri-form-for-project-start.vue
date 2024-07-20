<template>
    <div class="form-wrapper" v-show="props.modelValue">
        <div class="form-for-project-start">
            <header>
                <h2>Обсудить проект или договориться о встрече</h2>
                <button @click="model = false"><img src="@/assets/images/buttons/button-close.svg"></button>
            </header>
            <form name="form-for-project-start">
                <div class="column">
                    <strong class="fields-header headers-field">Контактные данные</strong>
                    <quanberri-form-input v-model="state.name" ref="field_name" />
                    <quanberri-form-input v-model="state.email" ref="field_email" />
                    <quanberri-form-input v-model="state.phone" ref="field_phone" />
                    <quanberri-form-input v-model="state.company" ref="field_company" />
                    <quanberri-form-textarea v-model="state.message" ref="field_message" />
                </div>
                <div class="column">

                    <strong>Услуги</strong>
                    <div class="field" data-type="select" ref="field_services">
                        <div class="choices">
                            <span :class="{ 'active': state.services.includes(name) }"
                                v-for="(value, name) in servicesFieldChoices" :key="name" :name="value"
                                @click="toggleElement(state.services, name)">{{ value }}</span>
                        </div>
                        <select name="" v-show="false" multiple v-model="state.services">
                            <option v-for="(value, name) in servicesFieldChoices" :key="name" :name="value">{{ name }}
                            </option>
                        </select>
                    </div>

                    <strong>Бюджет</strong>
                    <div class="field" data-type="select" ref="field_budget">
                        <div class="choices">
                            <span :class="{ 'active': state.budget[0] == name }"
                                v-for="(value, name) in budgetFieldChoices" :key="name" :name="name"
                                @click="toggleBudget(state.budget, name)">{{ value }}</span>
                        </div>
                        <select name="" v-show="false" v-model="state.budget">
                            <option v-for="(value, name) in budgetFieldChoices" :key="name" :name="value">{{ value }}
                            </option>
                        </select>
                    </div>

                    <strong>Загрузите свое ТЗ</strong>
                    <div class="field" data-type="file" ref="field_file">
                        <div class="file-view">
                            <button type="button" @click="() => file_ref.click()">
                                <img src="@/assets/images/buttons/button-plus.svg" alt="Добавить файл">
                            </button>
                            <div class="file-description-column">
                                <p class="description">Добавить файл</p>
                                <p class="hidden-description">Можно загрузить один файл максимум 15мб</p>
                            </div>
                        </div>
                        <input type="file" name="file" v-show="false" ref="file_ref" />
                    </div>


                    <div class="field" data-type="checkbox" ref="field_confidential">
                        <input type="checkbox" name="confidential" v-show="false" v-model="state.submit_disabled">
                        <button type="button" class="checkbox-view" @click="state.submit_disabled = !state.submit_disabled">
                            <template v-if="state.submit_disabled == false">
                                <img class="check" src="@/assets/images/buttons/button-close.svg" alt="Подтверждение"/>
                            </template>
                            <template v-else >

                            </template>
                        </button>
                        <p>Я прочитал <a href="#">политику обработки персональных данных</a> <br>и <a href="#">даю
                                согласие
                                на обработку своих данных</a>
                        </p>
                    </div>

                    <input :class="{'input_active': !state.submit_disabled,'submit':true}"  type="submit" value="Отправить" :disabled="state.submit_disabled">
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import quanberriFormInput from '@/components/form-for-project-start/quanberri-form-input.vue'
import quanberriFormTextarea from './quanberri-form-textarea.vue';
import { defineEmits, defineProps, computed, reactive, ref } from 'vue';

const emit = defineEmits(['update:modelValue'])
const props = defineProps(['modelValue']);

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

const servicesFieldChoices = {
    'ux-analisys': 'Ux-аналитика',
    'ux-research': 'Ux-исследование',
    'interface-design': 'Дизайн интерфейсов',
    'web-design-and-integration': 'Веб-разработка и интеграции',
    'develop': 'Разработка',
    'another': 'Другое'
}

const budgetFieldChoices = {
    'lt1m': 'Менее 1 млн',
    '1-3m': '1 - 3 млн',
    '3-5m': '3 - 5 млн',
    '5-10m': '5 - 10 млн',
    '10-15m': '10-15млн',
    'lg15m': ' Более 15 млн'
}

const state = reactive({
    name: '',
    email: '',
    phone: '',
    company: '',
    message: '',
    services: [],
    budget: [],
    file: '',
    submit_disabled: true
});

const toggleElement = (arr = [], element = '') => {
    if (arr.includes(element)) {
        const index = arr.findIndex((v) => v == element);
        arr.splice(index, 1);
    } else {
        arr.push(element);
    }
}

const toggleBudget = (arr, element) => {
    // why this only works with arrays ?????????
    if (arr.includes(element)) {
        arr[0] = '';
    } else {
        arr[0] = element;
    }
}

const file_ref = ref();


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

    & .form-for-project-start form {
        display: flex;
        flex-flow: row wrap;
        gap: 50px;
        justify-content: center;
    }
}

.field {
    max-width: 500px;
}



.field .check{
    width:100%;
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

.submit.input_active{
    border:1px solid white;
    color:white;
}
</style>