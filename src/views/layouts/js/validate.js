class Validate {
  constructor(form, error, submit, config) {
    this.form = form
    this.error = error
    this.submit = submit
    this.config = config
    this.inputsValid = new Set()

    this.init()
  }

  init() {
    this.disableSubmitButton()

    for (const inputName in this.config) {
      const inputDOM = this.getInput(inputName)
      const rules = this.config[inputName]

      inputDOM.addEventListener('blur', () => this.handleBlur(inputName, rules))
      inputDOM.addEventListener('input', () => this.handleInput(inputName, rules))
    }
  }

  handleBlur(inputName, rules) {
    const { isValid, message } = this.validateInput(inputName, rules)

    if (!isValid) {
      this.displayErrorMessage(inputName, message)
      this.inputsValid.delete(inputName)
    }
  }

  handleInput(inputName, rules) {
    const { isValid } = this.validateInput(inputName, rules)

    if (isValid) {
      this.inputsValid.add(inputName)
    } else {
      this.inputsValid.delete(inputName)
    }

    this.toggleSubmitButton()
  }

  validateInput(inputName, rules) {
    this.removeErrorMessage(inputName)
    let isValid = true

    for (const ruleName in rules) {
      const { value, message } = rules[ruleName]
      isValid = this[ruleName](inputName, value)

      if (!isValid) {
        return { isValid, message }
      }
    }

    return { isValid }
  }

  displayErrorMessage(inputName, message) {
    this.error.insertAdjacentHTML('afterbegin', `<li id="error-${inputName}" class="error-message">${message}</li>`)
  }

  removeErrorMessage(inputName) {
    this.error.querySelector(`#error-${inputName}`)?.remove()
  }

  toggleSubmitButton() {
    this.submit.disabled = this.inputsValid.size !== Object.keys(this.config).length
  }

  disableSubmitButton() {
    this.submit.disabled = true
  }

  getInput(inputName) {
    return this.form.querySelector(`input[name="${inputName}"]`)
  }

  isRequired(inputName, bool) {
    const input = this.getInput(inputName)
    return bool ? input.value.trim() !== '' : true
  }

  isPhone(inputName, bool) {
    const input = this.getInput(inputName)
    return bool ? input.value.trim().match(/^[0-9]{10}$/) : true
  }

  minLength(inputName, min) {
    const input = this.getInput(inputName)
    return input.value.trim().length >= min
  }

  maxLength(inputName, max) {
    const input = this.getInput(inputName)
    return input.value.trim().length <= max
  }

  match(inputName, match) {
    const input = this.getInput(inputName)
    const inputMatch = this.getInput(match)

    const value = input.value.trim()
    const matchValue = inputMatch.value.trim()

    return value === matchValue
  }
}
