function insertProduct() {
  configureModalForm({
    modalId: 'productModal',
    tile: 'Add Product',
    action: '/admin/products/insert',
    submitText: 'Add Product',
    submitName: 'insert'
  })

  clearModalForm('productModal')
}

function updateProduct(p) {
  clearModalForm('productModal')

  configureModalForm({
    modalId: 'productModal',
    tile: 'Update Product',
    action: '/admin/products/update/' + p.product_id,
    submitText: 'Update Product',
    submitName: 'update'
  })

  $('input[name="name"]').value = p.name
  $('input[name="price"]').value = p.price
  $('input[name="offer"]').value = p.offer
  $('input[name="thumbnail-old"]').value = p.thumbnail

  $('input[name="thumbnail"]').required = false
  $(`option[value="${p.category_id}"]`).selected = true
}
