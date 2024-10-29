function insertCategory() {
  configureModalForm({
    modalId: 'categoryModal',
    tile: 'Add Category',
    action: '/admin/categories/insert',
    submitText: 'Add Category',
    submitName: 'insert'
  })

  clearModalForm('categoryModal')
}

function updateCategory(c) {
  configureModalForm({
    modalId: 'categoryModal',
    tile: 'Update Category',
    action: '/admin/categories/update/' + c.id,
    submitText: 'Update Category',
    submitName: 'update'
  })

  $('input[name="name"]').value = c.name
}
