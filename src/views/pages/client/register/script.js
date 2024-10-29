const form = $('#registerForm')
const error = form.querySelector('#error-list')
const submit = form.querySelector('#registerBtn')

new Validate(form, error, submit, {
  name: {
    isRequired: {
      value: true,
      message: 'Name is required'
    },
    minLength: {
      value: 3,
      message: 'Name must be at least 3 characters'
    }
  },
  phone: {
    isRequired: {
      value: true,
      message: 'Phone number is required'
    },
    isPhone: {
      value: true,
      message: 'Please enter a valid 10-digit phone number'
    }
  },
  password: {
    isRequired: {
      value: true,
      message: 'Password is required'
    },
    minLength: {
      value: 6,
      message: 'Password must be at least 6 characters'
    }
  },
  confirmPassword: {
    isRequired: {
      value: true,
      message: 'Confirm password is required'
    },
    match: {
      value: 'password',
      message: 'Password does not match'
    }
  }
})
