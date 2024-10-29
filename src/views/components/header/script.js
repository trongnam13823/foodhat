function toggleMenu(_this) {
  _this.classList.toggle('open')
  _this.querySelector('i').classList.toggle('fa-x')
}

$$('.header-nav__link').forEach((link) => {
  link.addEventListener('click', () => {
    toggleMenu($('.header-menu-toggle'))
  })
})

updateCartTotal()
