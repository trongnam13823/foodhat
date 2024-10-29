<section class="checkout user-dashboard">
  <div class="container">
    <div id="checkout-content">
      <div class="row gy-4">
        <div class="col-lg-8">
          <div class="checkout__add">
            <div class="checkout__header">
              <h3 class="m-0">Select Address
                <span onclick="insertAddress()" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addressModal">
                  <i class="far fa-plus"></i> New Address
                </span>
              </h3>
            </div>
            <div class='address__content'>
              <div class='row gy-4'>

                <!-- Address List Start -->
                <?php
                foreach ($data['addresses'] as $address) {
                  $user_id = $address['user_id'];
                  $id = $address['id'];
                  $country = $address['country'];
                  $state = $address['state'];
                  $city = $address['city'];
                  $street = $address['street'];
                ?>
                  <div class='col-md-6'>
                    <div onclick="selectAddress(<?= $user_id ?>, <?= $id ?>)" class='address__item'>
                      <label class='w-100'>
                        <ul>
                          <li>
                            <div class='d-flex align-items-center'>
                              <input type='radio' class='d-none' name='address'>
                              <div class='address__item__radio'></div>
                            </div>
                            <div class='address__item__link'>
                              <span onclick='updateAddress(<?= json_encode($address) ?>)' type='button' data-bs-toggle='modal' data-bs-target='#addressModal'><i class='fa-regular fa-pen-to-square'></i></span>
                              <a href='/address/delete/<?= $id ?>'><i class='fa-regular fa-trash'></i></a>
                            </div>
                          </li>
                          <li>Country: <span id='country'><?= $country ?></span></li>
                          <li>State: <span id='state'><?= $state ?></span></li>
                          <li>City: <span id='city'><?= $city ?></span></li>
                          <li>Street: <span id='street'><?= $street ?></span></li>
                        </ul>
                      </label>
                    </div>
                  </div>
                <?php } ?>

                <?php if (empty($data['addresses'])) { ?>
                  <div class='col-12'>
                    <p>You don't have any address yet.</p>
                  </div>
                <?php } ?>

                <!-- Address List End -->

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="cart__footer__content">
            <div class="cart__footer__details">
              <h6>Total Price</h6>
              <div class="cart__footer__details__price">
                <p>Subtotal: <span id="subtotal">$220</span></p>
                <p>Discount (-): <span>$0</span></p>
                <p>Delivery (+): <span>$0.00</span></p>
              </div>
              <p class="cart__footer__total"><span>Total:</span> <span id="grand-total">$220</span></p>
              <div class="coupon_form">
                <input name="coupon" type="text" placeholder="Coupon Code">
                <button class="btn">Apply</button>
              </div>

              <button onclick="completeOrder()" class="btn w-100 fw-bold p-2">Complete the
                order</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Modal -->
<div id="addressModal" class="modal fade" tabindex="-1">
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