<a href="/admin/orders" class="mb-3 fw-bold d-inline-block p-2 bg-info-subtle">
  <i class="fa-regular fa-bars me-1"></i>
  All Orders
</a>

<?php
$order_id = $data['order_id'];
$user_name = $data['user']['name'];
$user_phone = $data['user']['phone'];
$user_address = "{$data['address']['street']}, {$data['address']['city']}, {$data['address']['state']}, {$data['address']['country']}";
?>

<div class="bg-white p-4">
  <h2 class="text-info">Order Id: <?= $order_id ?></h2>

  <h3 class="mt-4 fs-4">Customer information</h3>
  <ul style="list-style: square;">
    <li class="ms-4 mt-2"><span class="fw-bold">Name:</span> <?= $user_name ?></li>
    <li class="ms-4 mt-2"><span class="fw-bold">Phone:</span> <?= $user_phone ?></li>
    <li class="ms-4 mt-2"><span class="fw-bold">Address:</span> <?= $user_address ?></li>
  </ul>

  <h3 class="mt-4 fs-4">Order information</h3>
  <table class="table mt-2">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Unit Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['orderItems'] as $item) { ?>
        <tr>
          <td><?= $item['id'] ?></td>
          <td><?= $item['product_name'] ?></td>
          <td>$<?= $item['price'] ?></td>
          <td><?= $item['quantity'] ?></td>
          <td>$<?= $item['price'] * $item['quantity'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>