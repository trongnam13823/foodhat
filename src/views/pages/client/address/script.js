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
