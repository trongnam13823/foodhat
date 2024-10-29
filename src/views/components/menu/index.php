<?php
$categories = $data['categories'];
$products = $data['products'];
?>


<section class="menu" id="menu">
  <div class="container">
    <div class="row row-cols-xl-2 row-cols-1">
      <div class="col-xl-5 col">
        <div class="section-heading mb-xl-0">
          <h4>Food Menu</h4>
          <h2>Popular Delicious Foods</h2>
        </div>
      </div>
      <div class="col-xl-7 col align-self-xl-end">

        <!-- Menu Filter start -->
        <div class="menu-filter d-flex  flex-wrap justify-content-xl-end justify-content-center">
          <a href="/#menu" class="<?= tabActive('/') ?>">All</a>
          <?php foreach ($data['categories'] as $c) {
            $id = $c['id'];
            $name = $c['name'];
          ?>
            <a href="/?menu-filter=<?= $id ?>#menu" class="<?= tabActive("?menu-filter=$id") ?>"><?= $name ?></a>
          <?php } ?>
        </div>
        <!-- Menu Filter end -->

      </div>
    </div>

    <?php
    if (count($products) == 0) {
      echo '<h3 class="text-center">No products found</h3>';
    }
    ?>

    <!-- Menu List start -->
    <div class="menu-list row row-cols-xxl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1 g-4">
      <?php foreach ($products as $product) {
        $thumbnail = $product['thumbnail'];
        $name = $product['name'];
        $price = $product['price'];
        $offer = $product['offer'];
        $c_name = $product['category_name'];
        $c_id = $product['category_id'];
      ?>
        <div class="col">
          <div class="menu-item">
            <div class="menu-item__img">
              <img src="/public/img/products/<?= $thumbnail ?>" alt="menu-item" />
            </div>
            <div class="menu-item__body">
              <a href="/?menu-filter=<?= $c_id ?>#menu" class="menu-item__category"><?= $c_name ?></a>

              <a href="#!">
                <h3 class="menu-item__title"><?= $name ?></h3>
              </a>

              <div class="menu-item__rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>

              <p class="menu-item__price">$<?= $price ?><?= $offer > 0 ? "<del>$offer</del>" : '' ?></p>

              <ul class="menu-item-action d-flex align-items-center">
                <li class="me-auto">
                  <button onclick='addToCart(<?= json_encode($product) ?>)' class="add" href="#!">Add to Cart</button>
                </li>

                <li>
                  <a class="icon" href="#!">
                    <i class="fa-regular fa-heart"></i>
                  </a>
                </li>

                <li>
                  <a class="icon" href="#!">
                    <i class="fa-regular fa-eye"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- Menu List end -->


  </div>

</section>