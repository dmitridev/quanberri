import { Validator, ValidationType } from './validator';

export class FormValidator {
    state = {}
    state(state) {
        this.state = state;
        return this;
    }

    constructor(state) {
        this.state = state;
    }


    checkForm() {
        return this.state;
    }

    async desktop() {
        if (!this.checkForm())
            return;

        const validator = new Validator();
        let fields = [
            { key: 'name', type: ValidationType.TEXT, value: this.state.name, error: 'Проверьте поле "имя"', predicate(field) { return !!field } },
            { key: 'email', type: ValidationType.EMAIL, value: this.state.email, error: 'Проверьте поле "почта"', predicate: (email) => !!email },
            { key: 'phone', type: ValidationType.PHONE, value: this.state.phone, error: 'Проверьте поле "Телефон"', predicate: (phone) => !!phone },
            { key: 'message', type: ValidationType.TEXT, value: this.state.message, error: 'Проверьте поле "Сообщение"', predicate: (message) => !!message },
            { key: 'services', type: ValidationType.SELECT, value: this.state.services, error: 'Выберите хотя бы один пункт в поле "Услуги"', predicate: (services) => services.length >= 1 },
            { key: 'budget', type: ValidationType.SELECT, value: this.state.budget, error: 'На какой бюджет вы рассчитываете?', predicate: (budget) => budget.length === 1 },
            { key: 'file', type: ValidationType.FILE, value: this.state.file, error: 'нет тз', predicate() { return true } }
        ]

        const errors = [];

        for (let object of fields) {
            errors.push({ key: object.key, check: validator.check(object.type, object.value, object.error, object.predicate) });
        }

        return errors;
    }

    async mobile() {
        if (!this.checkForm())
            return;

        const validator = new Validator();
        const fields = [
            { key: 'name', value: this.state.name, type: ValidationType.TEXT, error: "Обязательное поле" },
            { key: 'phone', value: this.state.phone, type: ValidationType.PHONE, error: "Некорректный формат телефона" },
            { key: 'message', value: this.state.message, type: ValidationType.TEXT, error: "Обязательное поле" },
            { key: 'email', value: this.state.email, type: ValidationType.EMAIL, error: "Некорректный формат почты" },
            { key: 'file', value:this.state.file, type: ValidationType.FILE, error:'Обязательное поле' },
        ]
        const errors = [];
        for (let object of fields) {
            errors.push({ key: object.key, check: validator.check(object.type, object.value, object.error, object.predicate) });
        }

        return errors;
    }
}

export default { FormValidator };