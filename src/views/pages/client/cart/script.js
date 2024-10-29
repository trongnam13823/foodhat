const cart = JSON.parse(localStorage.getItem('cart') ?? '[]')
renderCart()
function templateCartItem(p, i) {
  return `
<tr>
  <td>
    <img src="/public/img/products/${p.thumbnail}" alt="">
  </td>
  <td class="cart__td__details">
    <h3>${p.name}</h3>
    <p>${p.category_name}</p>
  </td>
  <td>
    ${p.price}
  </td>
  <td>
    <div class="cart__td__quantity">
      <div onclick="updateQuantity(${i}, +1)">+</div>
      <input readonly type="text" value="${p.quantity}">
      <div onclick="updateQuantity(${i}, -1)">-</div>
    </div>
  </td>
  <td>
    ${(p.price * p.quantity).toFixed(2)}
  </td>
  <td>
    <i onclick="updateQuantity(${i}, 0)" class="cart__td__remove fa-solid fa-trash"></i>
  </td>
</tr>`
}
function renderCart() {
  // Render cart
  if (cart.length === 0) {
    $('#cart-empty').style.display = 'block'
    $('#cart-content').style.display = 'none'
  } else {
    $('#cart-empty').style.display = 'none'
    $('#cart-content').style.display = 'block'

    $('#cart-tbody').innerHTML = cart.map(templateCartItem).join('')
  }

  // Update cart total
  const total = cart.reduce((a, b) => a + b.price * b.quantity, 0)
  $('#subtotal').innerText = $('#grand-total').innerText = total
}

function updateQuantity(i, delta) {
  // Update quantity
  delta === 0 ? (cart[i].quantity = 0) : (cart[i].quantity += delta)

  // Remove item
  if (cart[i].quantity <= 0) cart.splice(i, 1)

  // Save cart
  localStorage.setItem('cart', JSON.stringify(cart))

  // Re-render
  updateCartTotal()
  renderCart()
}
