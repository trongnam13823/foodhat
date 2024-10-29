<button onclick="insertProduct()" type="button" class="mb-3 fw-bold d-inline-block p-2 bg-info-subtle" data-bs-toggle="modal" data-bs-target="#productModal">
  <i class="fa-sharp fa-solid fa-plus me-1"></i>
  Add Product
</button>

<table class="table table-hover text-center table-bordered">
  <thead>
    <tr>
      <th style="min-width: 60px; width: 5%" scope="col">Id</th>
      <th style="min-width: 200px; width: 20%" scope="col">Thumnail</th>
      <th style="min-width: 140px; width: 15%" scope="col">Name</th>
      <th style="min-width: 140px; width: 15%" scope="col">Category</th>
      <th style="min-width: 140px; width: 15%" scope="col">Price</th>
      <th style="min-width: 140px; width: 15%" scope="col">Offer</th>
      <th style="min-width: 140px; width: 20%" scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <!-- Products List Start -->
    <?php foreach ($data['products'] as $product) {

      $thumbnail = $product['thumbnail'];
      $name = $product['name'];
      $price = $product['price'];
      $offer = $product['offer'];
      $active = $product['active'];
      $p_id = $product['product_id'];
      $c_name = $product['category_name'];
      $c_id = $product['category_id'];
    ?>
      <tr class="product-row" style="vertical-align: middle;">
        <td><?= $p_id ?></td>
        <td>
          <img class="product-thumnail" src="/public/img/products/<?= $thumbnail ?>" alt="Thumnail">
        </td>
        <td class="product-name"><?= $name ?></td>
        <td class="product-category"><?= $c_name ?></td>
        <td class="product-price"><?= $price ?></td>
        <td class="product-offer"><?= $offer ?></td>
        <td>
          <a href="/admin/products/update/<?= $p_id ?>?active=<?= $active == 1 ? 0 : 1 ?>"><i class="<?= $active ? 'fa-eye' : 'fa-eye-slash' ?> fa-sharp fa-solid fa-xl me-3"></i></a>
          <i onclick='updateProduct(<?= json_encode($product) ?>)' class="fa-sharp fa-solid fa-pen-to-square fa-xl me-3" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#productModal"></i>
          <a href="/admin/products/delete/<?= $p_id ?>?thumbnail=<?= $thumbnail ?>"><i class="fa-sharp fa-solid fa-trash fa-xl"></i></a>
        </td>
      </tr>
    <?php } ?>

    <?php if (count($data['products']) == 0) { ?>
      <tr>
        <td colspan="7" class="text-center">No Products</td>
      </tr>
    <?php } ?>
    <!-- Products List End -->

  </tbody>
</table>

<!-- Modal -->
<div id="productModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form id="modal-form" method="post" action="" class="modal-content" enctype="multipart/form-data">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-4">
          <div class="col-12">
            <label for="Thumnail" class="form-label">Thumnail Image</label>
            <input type="file" class="form-control" name="thumbnail" required>
            <input type="text" name="thumbnail-old" hidden>
          </div>
          <div class="col-12">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="col-12">
            <label for="Category" class="form-label">Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
              <?php foreach ($data['categories'] as $category) { ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php }; ?>
            </select>
          </div>
          <div class="col-12">
            <label for="Price" class="form-label">Price</label>
            <input type="number" min="0" step="0.01" class="form-control" name="price" required>
          </div>
          <div class="col-12">
            <label for="Offer" class="form-label">Offer Price</label>
            <input type="number" min="0" step="0.01" class="form-control" name="offer">
          </div>
          <div class="col-12">
            <button id="modal-submit" type="submit" class="fw-bold d-inline-block p-2 bg-info-subtle"></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>