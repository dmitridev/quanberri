<template>
    <div class="form-wrapper">
        <div class="form-for-project-start">
            <header>
                <h2>{{ !formState.submitted ? 'Обсудить проект или договориться о встрече' : '' }}</h2>
                <button @click="emit('close')"><img src="@/assets/images/buttons/button-close.svg"></button>
            </header>
            <form class="form-style" name="form-for-project-start" @submit.prevent="emit('submitForm', state)"
                ref="form_ref">
                <template v-if="!formState.submitted">

                    <div class="column">
                        <strong class="fields-header headers-field">Контактные данные</strong>
                        <quanberri-form-input formName="name" name="Имя и Фамилия" v-model="state.name" ref="field_name" :error="props.error?.name"
                             />
                        <quanberri-form-input formName="email" name="Почта" v-model="state.email" ref="field_email" :error="props.error?.email"
                             />
                        <quanberri-form-input formName="phone" name="Телефон" v-model="state.phone" ref="field_phone" :error="props.error?.phone"
                            mask="+7(###) ###-##-##" />
                        <quanberri-form-input formName="company" name="Компания" v-model="state.company" :error="props.error?.company"
                            ref="field_company" />
                        <quanberri-form-textarea formName="message" name="Сообщение" v-model="state.message" :error="props.error?.message"
                             ref="field_message" />
                    </div>

                    <div class="column">
                        <strong>Услуги</strong>
                        <div class="field" data-type="select" ref="field_services">
                            <div class="choices">
                                <span :class="{ 'active': state.services.includes(name) }"
                                    v-for="(value, name) in servicesFieldChoices" :key="name" :name="value"
                                    @click="toggleElement(state.services, name)">{{ value }}</span>
                            </div>
                            <select name="services" v-show="false" multiple v-model="state.services">
                                <option v-for="(value, name) in servicesFieldChoices" :key="name" :name="value">{{ name
                                    }}
                                </option>
                            </select>
                        </div>
                        <p class="error">{{props.error?.services}}</p>

                        <strong>Бюджет</strong>
                        <div class="field" data-type="select" ref="field_budget">
                            <div class="choices">
                                <span :class="{ 'active': state.budget[0] == name }"
                                    v-for="(value, name) in budgetFieldChoices" :key="name" :name="name"
                                    @click="toggleBudget(state.budget, name)">{{ value }}</span>
                            </div>
                            <select name="budget" v-show="false" v-model="state.budget">
                                <option v-for="(value, name) in budgetFieldChoices" :key="name" :name="value">{{ value
                                    }}
                                </option>
                            </select>
                        </div>
                        <p class="error">{{props.error?.budget}}</p>

                        <strong>Загрузите свое ТЗ</strong>
                        <div class="field" data-type="file" ref="field_file">
                            <template v-if="fileValue.filename === '' && !fileValue.error">
                                <div class="file-view">
                                    <button type="button" @click="() => file_ref.click()" @change="file_update">
                                        <img src="@/assets/images/buttons/button-plus.svg" alt="Добавить файл">
                                    </button>
                                    <div class="file-description-column">
                                        <p class="description">Добавить файл</p>
                                        <p class="hidden-description">Можно загрузить один файл максимум 15мб</p>
                                    </div>
                                </div>
                            </template>
                            <template v-else-if="fileValue.error">
                                <div class="file-view">
                                    <button type="button" @click="() => file_ref.click()" @change="file_update">
                                        <img src="@/assets/images/buttons/button-plus.svg" alt="Добавить файл">
                                    </button>
                                    <div class="file-description-column">
                                        <p class="hidden-description" style="color:red">Можно загрузить один файл
                                            максимум
                                            15мб</p>
                                    </div>
                                </div>
                            </template>
                            <template v-else>
                                <div style="display:flex; justify-content:space-between;">
                                    <div class="file-description-column">
                                        <p class="description">{{ fileValue.filename }}</p>
                                        <p class="hidden-description">{{ fileValue.size }} байт</p>
                                    </div>
                                    <button type="button" @click="file_remove">
                                        <img src="@/assets/images/buttons/button-close.svg" alt="удалить файл">
                                    </button>
                                </div>
                            </template>

                            <input type="file" name="file" @change="set_file" v-show="false" ref="file_ref"
                                accept=".doc,.docs,.pdf,.txt,.ppt,.odf,.odt" />
                        </div>
                        <p class="error">{{ props.error?.file }}</p>

                        <div class="field" data-type="checkbox" ref="field_confidential">
                            <input type="checkbox" name="confidential" v-show="false" v-model="state.submit_disabled">
                            <button type="button" class="checkbox-view"
                                @click="state.submit_disabled = !state.submit_disabled">
                                <template v-if="state.submit_disabled == false">
                                    <img class="check" src="@/assets/images/buttons/button-close.svg"
                                        alt="Подтверждение" />
                                </template>
                                <template v-else>

                                </template>
                            </button>
                            <p>Я прочитал <a href="#">политику обработки персональных данных</a> <br>и <a href="#">даю
                                    согласие
                                    на обработку своих данных</a>
                            </p>
                        </div>

                        <input :class="{ 'input_active': !state.submit_disabled, 'submit': true }" type="submit"
                            value="Отправить" :disabled="state.submit_disabled">
                    </div>

                </template>
                <template v-else>
                    <div class="form-submitted-message">
                        <img src="@/assets/images/statuses/submit-success.svg">
                        <p>Форма заявки успешно <span style="color:yellow">заполнена</span></p>
                    </div>
                </template>
            </form>
        </div>
    </div>
</template>
<script setup>
import quanberriFormInput from '@/components/form-for-project-start/quanberri-form-input.vue'
import quanberriFormTextarea from '../quanberri-form-textarea.vue';
import { defineEmits, reactive, ref,defineProps } from 'vue';

const emit = defineEmits(['update:modelValue', 'close', 'submitForm'])
const props = defineProps(['error']);
console.log(props);
const fileValue = reactive({
    filename: '',
    size: 0,
    error: false
});

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
const form_ref = ref();
const formState = reactive({ submitted: false });

const set_file = (event) => {
    fileValue.error = false;
    const maxFileLengthInBytes = 15_728_640;

    console.log(event.target.files);
    const [file] = event.target.files;
    if (file.size > maxFileLengthInBytes) {
        fileValue.error = true;
        console.log(event);
        file_ref.value.files = new DataTransfer().files;
        event.preventDefault();
        return;
    }

    fileValue.filename = file.name;
    fileValue.size = file.size;

    state.file = file;
}

const file_remove = () => {
    let dataTransfer = new DataTransfer();
    file_ref.value.files = dataTransfer.files;
    fileValue.filename = '';
    fileValue.size = 0;
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