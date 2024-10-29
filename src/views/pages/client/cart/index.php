<section class="cart">
  <div class="container">

    <!-- Cart empty start-->
    <div id="cart-empty">
      <h3 class="text-center">Your Shopping Cart is Empty!</h3>
    </div>
    <!-- Cart empty end-->

    <!-- Cart content start-->
    <div id="cart-content">
      <div class="cart__table" id="cart-table">
        <table>
          <thead>
            <tr>
              <th class="cart__th__image">Image</th>
              <th class="cart__th__details">Details</th>
              <th class="cart__th__price">Price</th>
              <th class="cart__th__quantity">Quantity</th>
              <th class="cart__th__total">Total</th>
              <th class="cart__th__remove">Remove</th>
            </tr>
          </thead>
          <tbody id="cart-tbody">
            <!-- Cart item -->
          </tbody>
        </table>
      </div>

      <div class="cart__footer">
        <div class="row gy-4">
          <div class="col-xl-7 col-md-6">
            <img class="cart__footer__image" src="/public/img/cart-footer.jpg" alt="">
          </div>
          <div class="col-xl-5 col-md-6">
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

                <a class="btn w-100 fw-bold p-2" href="/checkout">Check Out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Cart content end-->

  </div>
</section>