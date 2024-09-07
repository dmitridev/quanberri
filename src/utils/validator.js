const errorMessageForWrongFormatOfFile = "Непонятный формат файла! Допустимые форматы .doc, .docx, .pdf, .txt, .ppt, .odf, .odt";
const errorMessageForSizeOfFile = "Файл должен быть меньше 15 мб!";
const maxFileLengthInBytes = 15_728_640;

export class Validator {
    check(type = ValidationType.TEXT, value = "", error = "", predicateForSelect = (value) => value.length > 1) {
        switch (type) {
            case ValidationType.PHONE: {
                const result = this.checkPhone('phone', value, error);
                return result;
            }

            case ValidationType.EMAIL: {
                return this.checkEmail('email', value, error)
            }

            case ValidationType.FILE: {
                return this.checkFile('file', value, error);
            }

            case ValidationType.TEXT: {
                return this.checkText('', value, error);
            }

            case ValidationType.SELECT: {
                return this.checkSelect('', value, error, predicateForSelect);
            }
        }

        throw Error("неподходящий параметр для проверки")
    }

    basicCheck({ key = "", value = "", regexp = new RegExp(), error = "" }) {
        return {
            key, value, regexp, error, result: regexp.test(value)
        }
    }

    checkSelect(key = "", value = "", error = "", predicateForSelect = (value) => { return !!value }) {
        const result = predicateForSelect(value);
        return {
            key, value, error, result
        }
    }


    basicFileCheck({
        key = "", file = "", predicate = function (self, file) {
            if (!file) {
                return { result: false, error: `Проверьте поле 'Файл'` }
            }

            if (file.size > maxFileLengthInBytes) {
                return { result: false, error: errorMessageForSizeOfFile };
            }

            if (file.size == 0) {
                return { result: false, error: 'Файл не может быть пустым!' };
            }

            if (!file.name.includes('.')) {
                return { result: false, error: errorMessageForWrongFormatOfFile }
            }

            if (!self.checkFilename(file.name.split('.')?.pop()))
                return { result: false, error: errorMessageForWrongFormatOfFile };

            return { result: true, error: '' }
        }
    }) {
        const { result = true, error = '' } = predicate(this, file);
        return {
            key, value: file, error, result
        }

    }

    checkPhone(key = "phone", value = "", error = "") {
        // eslint-disable-next-line
        const regexp = new RegExp(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/im);
        return this.basicCheck({ key, regexp, value, error });
    }

    checkEmail(key = "email", value = "", error = "") {
        // eslint-disable-next-line
        const regexp = new RegExp(/.+@.+\..+/i);
        return this.basicCheck({ key, regexp, value, error });
    }

    checkText(key = "", value = "", error = "") {
        return this.basicCheck({ key, regexp: new RegExp(".+"), value, error });
    }

    checkFile(key = "file", file = new File(), error = "") {
        return this.basicFileCheck({ key: key, file, error: error })
    }

    checkFilename(value = "doc") {
        if (!value)
            return false;

        return ["doc", "docx", "pdf", "txt", "ppt", "odf", "odt"].includes(value);
    }
}

export const ValidationType = Object.freeze({
    FILE: "file",
    TEXT: "text",
    PHONE: "phone",
    EMAIL: "email",
    SELECT: "select"
});

export default { Validator, ValidationType };
