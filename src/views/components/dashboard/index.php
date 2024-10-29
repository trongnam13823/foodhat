<?php
$name = $_SESSION['user']['name'] ?? '';
$avatar = $_SESSION['user']['avatar'] ?? 'default.jpg';
?>

<div class="container">
  <div id="dashboard" class="dashboard">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <div class="dashboard__box">
          <div class="dashboard__header">
            <div class="dashboard__avatar">
              <img src="/public/img/avatar/<?= $avatar ?>" alt="">
              <label>
                <i class="far fa-camera" aria-hidden="true"></i>
                <form id="avatar" action="/profile/updateAvatar" method="post" enctype="multipart/form-data">
                  <input onchange="$('#avatar').submit()" type="file" name="avatar" hidden>
                </form>
              </label>
            </div>
            <!-- User name -->
            <h2><?= $name ?></h2>
          </div>

          <!-- Tab Link start -->
          <ul class="dashboard__menu">
            <li class="<?= tabActive('profile') ?>">
              <a href="/profile#dashboard">
                <i class="fa-solid fa-user"></i>
                My Profile
              </a>
            </li>
            <li class="<?= tabActive('address') ?>">
              <a href="/address#dashboard">
                <i class="fa-solid fa-location-dot"></i>
                Address
              </a>
            </li>
            <li class="<?= str_contains($_SERVER['REQUEST_URI'], 'orders') ? 'active' : '' ?>">
              <a href="/orders#dashboard">
                <i class="fa-solid fa-bags-shopping"></i>
                Orders
              </a>
            </li>
            <li class="<?= tabActive('logout') ?>">
              <a href="/logout#dashboard">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
              </a>
            </li>
          </ul>
          <!-- Tab Link end -->

        </div>
      </div>
      <div class="col-xl-9 col-lg-8">
        <div class="dashboard__content">

          <!-- Content start -->
          <?php
          $page = $data['page'];
          unset($data['page']);
          requireView("/pages/$page", $data);
          ?>
          <!-- Content end -->

        </div>
      </div>
    </div>
  </div>
</div>