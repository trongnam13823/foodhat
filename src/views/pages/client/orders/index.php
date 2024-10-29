<div class='orders user-dashboard'>
  <h3>Orders</h3>
  <div class='orders__responsive'>
    <table class='orders__table'>
      <thead>
        <tr>
          <th>Order ID</th>
          <th style="min-width: 100px; max-width: 100px;" class="text-start">Date</th>
          <th>Status</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <!-- Orders list start -->
        <?php foreach ($data['orders'] as $order) {
          $id = $order['id'];
          $date = $order['date'];
          $status = $order['status_name'];
          $quantity = $order['quantity'];
          $total = $order['total'];
        ?>
          <tr>
            <td><a href="/orders/detail/<?= $id ?>#dashboard" class="d-block text-decoration-underline text-primary"><?= $id ?></a>
            </td>
            <td style="min-width: 100px; max-width: 100px; width: 100px;" class="text-start"><?= $date ?></td>
            <td><span class='green status'><?= $status ?></span></td>
            <td><?= $quantity ?></td>
            <td>$<?= $total ?></td>
            <td>
              <?php if ($status === 'Pending') { ?>
                <a class="btn bg-danger" href="orders/update/<?= $id ?>?status=6">Cancel</a>
              <?php }; ?>

              <?php if ($status === 'Delivered') { ?>
                <a class="btn bg-success" href="orders/update/<?= $id ?>?status=5">Received</a>
              <?php }; ?>
            </td>
          </tr>
        <?php }; ?>
        <!-- Orders list end -->

      </tbody>
    </table>
  </div>
</div>