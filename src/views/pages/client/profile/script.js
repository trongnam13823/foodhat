function updateProfile(user) {
  configureModalForm({
    modalId: 'profileModal',
    tile: 'Update Profile',
    action: '/profile/update/' + user.id,
    submitText: 'Update Profile',
    submitName: 'update'
  })

  $('input[name="name"]').value = user.name
  $('input[name="phone"]').value = user.phone
}
