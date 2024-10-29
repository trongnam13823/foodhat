<header class="header">
  <div class="container position-relative d-flex align-items-center h-100">
    <div class="header-logo">
      <a href="/">
        <img class="w-100" src="/public/img/logo-text.png" alt="logo" />
      </a>
    </div>

    <button onclick="toggleMenu(this)" class="header-menu-toggle d-lg-none d-block ms-auto">
      <i class="fa-solid fa-bars fa-lg"></i>
    </button>

    <div class="header-menu d-lg-flex flex-fill">
      <nav class="header-nav mx-auto">
        <ul class="header-nav__list d-flex flex-lg-row flex-column text-center">
          <li><a class="header-nav__link" href="/#home">Home</a></li>
          <li><a class="header-nav__link" href="/#menu">Menu</a></li>
          <li><a class="header-nav__link" href="/#chefs">Our Chefs</a></li>
          <li><a class="header-nav__link" href="/#blog">Blog</a></li>
          <li><a class="header-nav__link" href="/#reservation">Reservation</a></li>
        </ul>
      </nav>

      <ul class="header-user d-flex align-items-center p-lg-0 p-4 justify-content-lg-start justify-content-center">
        <li>
          <a href="/cart" class="header-user__link">
            <i class="fa-sharp fa-solid fa-basket-shopping"></i>
            <span class="cart-total" id="cart-total">12</span>
          </a>
        </li>

        <li>
          <a href="/profile" class="header-user__link">
            <i class="fa-solid fa-user"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>