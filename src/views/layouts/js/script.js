const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

if (!!$('#toast-content').textContent.trim()) {
  bootstrap.Toast.getOrCreateInstance($('#toast')).show()
}

function showToast(message) {
  $('#toast-content').innerText = message
  bootstrap.Toast.getOrCreateInstance($('#toast')).show()
}

function configureModalForm({ modalId, tile, action, submitText, submitName }) {
  const modal = document.querySelector(`#${modalId}`)
  modal.querySelector('.modal-title').innerText = tile
  modal.querySelector('#modal-form').action = action
  modal.querySelector('#modal-submit').innerText = submitText
  modal.querySelector('#modal-submit').name = submitName
}

function clearModalForm(modalId) {
  $$(`#${modalId} input`).forEach((input) => {
    input.value = ''
  })
}

function updateCartTotal() {
  const cart = JSON.parse(localStorage.getItem('cart') ?? '[]')
  $('#cart-total').innerText = cart.length
}
