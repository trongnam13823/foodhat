const form = $('#loginForm')
const error = form.querySelector('#error-list')
const submit = form.querySelector('#loginBtn')

$('input[name="showPassword"]').onchange = () => {
  if ($('input[name="showPassword"]').checked) {
    $('input[name="password"]').type = 'text'
  } else {
    $('input[name="password"]').type = 'password'
  }
}

new Validate(form, error, submit, {
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
  }
})
