<div class='address user-dashboard'>
  <h3>
    Address
    <span onclick='insertAddress()' class='btn' data-bs-toggle='modal' data-bs-target='#addressModal'>Add new</span>
  </h3>
  <div class='address__content'>
    <div class='row gy-4'>

      <!-- Address list start -->
      <?php if (count($data['addresses']) > 0) {
        foreach ($data['addresses'] as $a) {
          $id = $a['id'];
          $country = $a['country'];
          $state = $a['state'];
          $city = $a['city'];
          $street = $a['street']
      ?>
          <div class='col-md-6'>
            <div class='address__item'>
              <ul>
                <li>
                  <div class='address__item__link'>
                    <span onclick='updateAddress(<?= json_encode($a) ?>)' type='button' data-bs-toggle='modal' data-bs-target='#addressModal'>
                      <i class='fa-regular fa-pen-to-square'></i>
                    </span>
                    <a href='/address/delete/<?= $id ?>'><i class='fa-regular fa-trash'></i></a>
                  </div>
                </li>
                <li>Country: <?= $country ?></li>
                <li>State: <?= $state ?></li>
                <li>City: <?= $city ?></li>
                <li>Street: <?= $street ?></li>
              </ul>
            </div>
          </div>
        <?php }
      } else { ?>
        <div class='col-12'>
          <p>You don't have any address yet.</p>
        </div>
      <?php } ?>
      <!-- Address list end -->

    </div>
  </div>
</div>

<!-- Modal -->
<div id="addressModal" class="modal fade" id="addressModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form id="modal-form" method="get" action="" class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-4">
          <div class="col-6">
            <input type="text" placeholder="Country" name="country" required>
          </div>
          <div class="col-6">
            <input type="text" placeholder="State" name="state" required>
          </div>
          <div class="col-6">
            <input type="text" placeholder="City" name="city" required>
          </div>
          <div class="col-6">
            <input type="text" placeholder="Street" name="street" required>
          </div>
          <div class="col-12">
            <button id="modal-submit" type="submit" class="btn p-2 w-100"></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>