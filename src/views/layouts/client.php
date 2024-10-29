<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $display['title'] ?></title>
  <link rel="icon" type="image/png" href="/public/img/favicon-logo.png">
  <!-- ====== IMPORT FONT AWESOME ====== -->
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css" />

  <!-- ====== IMPORT CSS ====== -->
  <link rel="stylesheet" href="/src/views/layouts/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/src/views/layouts/css/style.css" />

  <!-- ====== IMPORT JS ====== -->
  <script defer src="/src/views/layouts/js/bootstrap.bundle.min.js"></script>
  <script defer src="/src/views/layouts/js/validate.js"></script>
  <script defer src="/src/views/layouts/js/script.js"></script>
</head>

<body>
  <?php requireView('/components/toast') ?>

  <?php requireView('/components/topbar') ?>
  <?php requireView('/components/header') ?>

  <main>
    <?php
    $component = isset($display['component']) ? $display['component'] : [];

    if (in_array('breadcrumb', $component)) {
      requireView("/components/breadcrumb", ['title' => $display['title']]);
    }

    if (in_array('dashboard', $component)) {
      $data['page'] = $display['page'];
      requireView("/components/dashboard", $data);
    } else {
      requireView("/pages/{$display['page']}", $data);
    }
    ?>
  </main>

  <?php requireView('/components/footer') ?>
</body>

</html>