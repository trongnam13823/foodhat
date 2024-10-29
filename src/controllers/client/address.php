<?php
class client_Address extends Controller
{
  public function __construct()
  {
    parent::__construct();
    loginRequired();
  }
  public function index()
  {
    $user_id = $_SESSION['user']['id'];

    //1. Model
    $addressesModel = $this->model('Addresses');

    //2. Get addresses
    $res = $addressesModel->selectUser($user_id);
    $addresses = $res['status'] ? $res['data'] : [];

    //3. View
    $this->view(
      [
        'title' => 'Address',
        'layout' => 'client',
        'component' => ['breadcrumb', 'dashboard'],
        'page' => 'client/address',
      ],
      [
        'addresses' => $addresses
      ]
    );
  }

  public function insert()
  {
    if (isset($_GET['insert'])) {
      //1. Model
      $addressesModel = $this->model('Addresses');

      //2. Insert address
      $res = $addressesModel->insert(
        [
          'user_id' => $_SESSION['user']['id'],
          'country' => $_GET['country'],
          'state' => $_GET['state'],
          'city' => $_GET['city'],
          'street' => $_GET['street'],
        ]
      );

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }

    redirect('/');
  }

  public function update($id)
  {
    if (isset($_GET['update'])) {
      //1. Model
      $addressesModel = $this->model('Addresses');

      //2. Update address
      $res = $addressesModel->update(
        $id,
        [
          'country' => $_GET['country'],
          'state' => $_GET['state'],
          'city' => $_GET['city'],
          'street' => $_GET['street'],
        ]
      );

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }

    redirect('/');
  }

  public function delete($id)
  {
    //1. Model
    $addressesModel = $this->model('Addresses');

    //2. Delete address
    $res = $addressesModel->delete($id);

    //3. Toast
    $_SESSION['toast'] = $res['message'];

    //4. Redirect
    redirect($_SERVER['HTTP_REFERER']);
  }
}
