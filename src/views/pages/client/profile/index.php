<?php
$id = $_SESSION['user']['id'] ?? '';
$name = $_SESSION['user']['name'] ?? '';
$phone = $_SESSION['user']['phone'] ?? '';
?>

<!-- Profile content start -->
<div id='profile' class='profile user-dashboard'>
  <h3>My Profile <span onclick='updateProfile(<?= json_encode($_SESSION["user"]) ?>)' class='btn' data-bs-toggle='modal' data-bs-target='#profileModal'>Update</span></h3>
  <div class='profile__info'>
    <div class='personal__info__text'>
      <p><span class='lable'>ID:</span><?= $id ?></p>
      <p><span class='lable'>Name:</span> <?= $name ?></p>
      <p><span class='lable'>Phone:</span> <?= $phone ?></p>
    </div>
  </div>

  <?php if ($_SESSION['user']['is_admin']) { ?>
    <a target="_blank" class="text-decoration-underline text-primary" href="/admin">Go to admin page <i class="fa-regular fa-arrow-up-right-from-square mt-4"></i></a>
  <?php } ?>
</div>
<!-- Profile content end -->

<div id="profileModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form id="modal-form" method="get" action="" class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-4">
          <div class="col-6">
            <input type="text" placeholder="Name" name="name" required>
          </div>
          <div class="col-6">
            <input type="tel" placeholder="Phone" name="phone" required>
          </div>
          <div class="col-12">
            <button id="modal-submit" type="submit" class="btn p-2 w-100"></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>