<div class="admin">
  <div class="container-fluid">
    <div class="row">
      <div class="col-2 bg-white ">
        <div class="admin-sidebar pt-3 ps-2" style="height: 100vh">
          <strong class="fs-5">ADMIN</strong>

          <!-- Tab Link start -->
          <ul class="py-1">
            <li class="my-2 <?= tabActive('admin') ?>">
              <a class="p-2 d-inline-block" href="/admin">Overview</a>
            </li>

            <li class="my-2 <?= tabActive('admin/orders') ?>">
              <a class="p-2 d-inline-block" href="/admin/orders">Orders</a>
            </li>

            <li class="my-2 <?= tabActive('admin/products') ?>">
              <a class="p-2 d-inline-block" href="/admin/products">Products</a>
            </li>

            <li class="my-2 <?= tabActive('admin/categories') ?>">
              <a class="p-2 d-inline-block" href="/admin/categories">Categories</a>
            </li>
          </ul>
          <!-- Tab Link end -->

        </div>
      </div>
      <div class="col-10">
        <div class="admin-content mt-3">

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