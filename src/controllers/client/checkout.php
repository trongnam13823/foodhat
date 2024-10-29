<?php
class client_Checkout extends Controller
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
        'title' => 'Checkout',
        'layout' => 'client',
        'component' => ['breadcrumb'],
        'page' => 'client/checkout',
      ],
      [
        'addresses' => $addresses
      ]
    );
  }
}
