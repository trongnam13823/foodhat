<?php
class client_Orders extends Controller
{

  public function __construct()
  {
    parent::__construct();
    loginRequired();
  }
  public function index()
  {
    //1. Model
    $ordersModel = $this->model('Orders');

    //2. Select Orders of User
    $res = $ordersModel->selectByUserId($_SESSION['user']['id']);
    $orders = $res['status'] ? $res['data'] : [];

    //3. View
    $this->view(
      [
        'title' => 'Orders',
        'layout' => 'client',
        'component' => ['breadcrumb', 'dashboard'],
        'page' => 'client/orders',
      ],
      [
        'orders' => $orders
      ]
    );
  }

  public function update($id)
  {
    if (isset($_GET['status']) && isset($id)) {
      //1. Model
      $ordersModel = $this->model('Orders');

      //2. Update Status
      $res = $ordersModel->update($id, ['status_id' => $_GET['status']]);

      //3. Redirect
      if ($res['status']) {
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
  }

  public function detail($id)
  {
    //1. Model
    $orderItemsModel = $this->model('Order_Items');

    //2. Select Orders Items of User
    $res = $orderItemsModel->selectByOrderId($id);
    $orderItems = $res['data'];

    //3. View
    $this->view(
      [
        'title' => 'Orders Detail',
        'layout' => 'client',
        'component' => ['breadcrumb', 'dashboard'],
        'page' => 'client/orders/detail',
      ],
      [
        'order_id' => $id,
        'orderItems' => $orderItems,
      ]
    );
  }
}
