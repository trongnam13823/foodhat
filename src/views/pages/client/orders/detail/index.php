<div class='orders user-dashboard'>

  <h3> Orders ID: <?= $data['order_id'] ?><a class="btn" href="/orders#dashboard">All Orders</a></h3>
  <div class='orders__responsive'>
    <table class='orders__table'>
      <thead>
        <tr>
          <th>#</th>
          <th>Product</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>

        <!-- Orders detail list start -->
        <?php foreach ($data['orderItems'] as $item) { ?>
          <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['product_name'] ?></td>
            <td>$<?= $item['price'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>$<?= $item['price'] * $item['quantity'] ?></td>
          </tr>
        <?php } ?>
        <!-- Orders detail list end -->

      </tbody>
    </table>
  </div>
</div>