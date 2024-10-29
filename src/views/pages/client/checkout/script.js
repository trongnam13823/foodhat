function updateAddress(a) {
  configureModalForm({
    modalId: 'addressModal',
    tile: 'Update Address',
    action: '/address/update/' + a.id,
    submitText: 'Update Address',
    submitName: 'update'
  })

  $('input[name="country"]').value = a.country
  $('input[name="state"]').value = a.state
  $('input[name="city"]').value = a.city
  $('input[name="street"]').value = a.street
}

function insertAddress() {
  configureModalForm({
    modalId: 'addressModal',
    tile: 'Add Address',
    action: '/address/insert',
    submitText: 'Add Address',
    submitName: 'insert'
  })

  clearModalForm('addressModal')
}

const order = {}

const cart = JSON.parse(localStorage.getItem('cart') ?? '[]')
const total = cart.reduce((a, b) => a + b.price * b.quantity, 0)

$('#subtotal').innerText = $('#grand-total').innerText = total

if (cart.length === 0) {
  $('#checkout-content').innerHTML = `<h2 class="text-center fs-3">Your Shopping Cart is Empty!</h2>`
}

function selectAddress(user_id, address_id) {
  order.user_id = user_id
  order.address_id = address_id
}

function completeOrder() {
  if (!order.address_id) {
    showToast('Please select an address')
    return
  }

  order.items = cart.map((item) => ({
    product_id: item.product_id,
    price: item.price,
    quantity: item.quantity
  }))
  order.total = total
  order.quantity = cart.length
  order.status_id = 1

  fetch('http://localhost/api/orders/insert', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(order)
  })
    .then((res) => res.json())
    .then((data) => {
      localStorage.removeItem('cart')
      updateCartTotal()
      $('#checkout-content').innerHTML = `<h1 class="text-center">${data.message}</h1>`
    })
    .catch((error) => {
      console.error('Error:', error)
    })
}
