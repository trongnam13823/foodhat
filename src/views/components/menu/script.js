function addToCart(p) {
  const cart = JSON.parse(localStorage.getItem('cart') ?? '[]')

  const cartItem = cart.find((item) => item.product_id === p.product_id)

  cartItem ? cartItem.quantity++ : cart.push({ ...p, quantity: 1 })

  localStorage.setItem('cart', JSON.stringify(cart))

  updateCartTotal()
  showToast(`Added ${p.name} to cart, quantity: ${cartItem?.quantity ?? 1}`)
}
