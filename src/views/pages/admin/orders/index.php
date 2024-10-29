<?php
$orders = $data['orders'];
$status = $data['status'];

$filter_status = $_GET['status'] ?? 'all';
$filter_date = $_GET['date'] ?? 'all';
?>

<!-- Orders Filter Start -->
<div class="bg-white p-4 mb-2">
  <div class="d-flex gap-4 align-items-center mb-3">
    <span style="width: 60px;" class="fs-5">Status:</span>
    <a class="<?= $filter_status == 'all' ? 'text-primary text-uppercase fw-bold' : '' ?>" style="text-decoration: underline;" href="/admin/orders/filter/?status=all&date=<?= $filter_date ?>">All</a>
    <?php foreach ($status as $s) { ?>
      <a style="text-decoration: underline;" class="<?= $s['name'] == $filter_status ? 'text-primary text-uppercase fw-bold' : '' ?>" href="/admin/orders/filter/?status=<?= $s['name'] ?>&date=<?= $filter_date ?>">
        <?= $s['name'] ?>
      </a>
    <?php }; ?>
  </div>

  <div class="d-flex gap-4 align-items-center">
    <span style="width: 60px;" class="fs-5">Date:</span>
    <a class="<?= $filter_date == 'all' ? 'text-primary text-uppercase fw-bold' : '' ?>" style="text-decoration: underline;" href="/admin/orders/filter/?status=<?= $filter_status ?>&date=all">All</a>
    <?php foreach (['Today', 'This Week', 'This Month'] as $d) { ?>
      <a class="<?= $d == $filter_date ? 'text-primary text-uppercase fw-bold' : '' ?>" style="text-decoration: underline;" href="/admin/orders/filter/?status=<?= $filter_status ?>&date=<?= $d ?>"><?= $d ?></a>
    <?php }; ?>
  </div>
</div>

<div class="bg-white p-4 mb-2">
  <form action="/admin/orders/filter/" method="get">
    <div class="input-group">
      <input type="hidden" name="status" value="<?= $filter_status ?>">
      <input type="hidden" name="date" value="<?= $filter_date ?>">
      <input type="text" class="form-control" name="search" placeholder="Search order id or customer name..." value="<?= $_GET['search'] ?? '' ?>">
      <button class="p-2 px-5 text-white bg-primary" type="submit">Search</button>
    </div>
  </form>
</div>
<!-- Orders Filter End -->

<table class="table table-hover text-center table-bordered">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Customer</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <!-- Orders List Start -->
    <?php foreach ($orders as $o) { ?>
      <tr>
        <td><a href="/admin/orders/detail/<?= $o['id'] ?>" class="text-decoration-underline text-primary d-block"><?= $o['id'] ?></a></td>
        <td><?= $o['user_name'] ?></td>
        <td><?= $o['quantity'] ?></td>
        <td><?= $o['total'] ?></td>
        <td><?= $o['date'] ?></td>
        <td>
          <div class="dropdown">
            <span class="dropdown-toggle w-100" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $o['status_name'] ?>
            </span>

            <ul class="dropdown-menu">
              <?php foreach ($status as $s) {
                if ($s['id'] == $o['status_id']) continue;
              ?>
                <li><a class="dropdown-item" href="/admin/orders/update/<?= $o['id'] ?>?status_id=<?= $s['id'] ?>"><?= $s['name'] ?></a></li>
              <?php }; ?>
            </ul>
          </div>
        </td>
      </tr>
    <?php }; ?>
    <!-- Orders List End -->

  </tbody>
</table>