<button onclick="insertCategory()" type="button" class="mb-3 fw-bold d-inline-block p-2 bg-info-subtle" data-bs-toggle="modal" data-bs-target="#categoryModal">
  <i class="fa-sharp fa-solid fa-plus me-1"></i>
  Add Product
</button>

<table class="table table-hover text-center table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <!-- Categories start -->
    <?php
    if (count($data['categories']) > 0) {
      foreach ($data['categories'] as $category) {
        $id = $category['id'];
        $name = $category['name'];
    ?>
        <tr class='category__row'>
          <td><?= $id ?></td>
          <td class='category__name'><?= $name ?></td>
          <td>
            <i onclick='updateCategory(<?= json_encode($category) ?>)' data-bs-toggle='modal' data-bs-target='#categoryModal' class='fa-sharp fa-solid fa-pen-to-square fa-xl me-3' style='cursor: pointer'></i>
            <a href='/admin/categories/delete/<?= $id ?>'><i class='fa-sharp fa-solid fa-trash fa-xl'></i></a>
          </td>
        </tr>
      <?php }
    } else { ?>
      <tr>
        <td colspan='3' class='text-center'>No Categories</td>
      </tr>
    <?php } ?>
    <!-- Categories end -->

  </tbody>
</table>

<!-- Modal -->
<div id="categoryModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form id="modal-form" method="get" action="" class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-4">
          <div class="col-12">
            <label for="name" class="form-label">Category name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="col-12">
            <button id="modal-submit" type="submit" class="fw-bold d-inline-block p-2 bg-info-subtle"></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>