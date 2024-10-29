<?php
class admin_Orders extends Controller
{

  public function __construct()
  {
    parent::__construct();
    adminRequired();
  }

  public function index()
  {
    //1. Model
    $ordersModel = $this->model('Orders');
    $orderStatus = $this->model('Order_Status');

    //2. Select Orders
    $res = $ordersModel->selectAll();
    $orders = $res['status'] ? $res['data'] : [];

    //3. Select Status
    $res = $orderStatus->selectAll();
    $status = $res['status'] ? $res['data'] : [];

    //4. View
    $this->view(
      [
        'title' => 'Admin - Orders',
        'layout' => 'admin',
        'page' => 'admin/orders',
      ],
      [
        'orders' => $orders,
        'status' => $status
      ]
    );
  }

  public function detail($id)
  {
    //1. Model
    $ordersModel = $this->model('Orders');
    $addressModel = $this->model('Addresses');
    $userModel = $this->model('Users');
    $orderItemsModel = $this->model('Order_Items');

    //2. Select Orders by id
    $res = $ordersModel->selectById($id, 'address_id, user_id');

    //3. Get address id and user id by order id
    $address_id = $res['data'][0]['address_id'];
    $user_id = $res['data'][0]['user_id'];

    //4. Select address by id
    $res = $addressModel->selectById($address_id, 'country, state, city, street');
    $address = $res['data'][0];

    //5. Select user by id
    $res = $userModel->selectById($user_id, 'name, phone');
    $user = $res['data'][0];

    //6. Select order items by order id
    $res = $orderItemsModel->selectByOrderId($id);
    $orderItems = $res['data'];

    //7. View
    $this->view(
      [
        'title' => 'Admin - Orders Detail',
        'layout' => 'admin',
        'page' => 'admin/orders/detail',
      ],
      [
        'order_id' => $id,
        'address' => $address,
        'user' => $user,
        'orderItems' => $orderItems,
      ]
    );
  }

  public function update($id)
  {
    if (isset($_GET['status_id']) && $id) {
      //1. Model
      $ordersModel = $this->model('Orders');

      //2. Update status
      $res = $ordersModel->update($id, ['status_id' => $_GET['status_id']]);

      //3. Toast
      $_SESSION['toast'] = $res['message'];

      //4. Redirect
      redirect($_SERVER['HTTP_REFERER']);
    }
    redirect('/');
  }

  public function filter()
  {
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $status = isset($_GET['status']) ? $_GET['status'] : 'all';
    $date = isset($_GET['date']) ? $_GET['date'] : 'all';

    //1. Model
    $ordersModel = $this->model('Orders');
    $orderStatus = $this->model('Order_Status');

    //2. Select Orders 
    $res = $ordersModel->filter($status, $date, $search);
    $orders = $res['status'] ? $res['data'] : [];

    //3. Select Status
    $res = $orderStatus->selectAll();
    $status = $res['status'] ? $res['data'] : [];

    //4. View
    $this->view(
      [
        'title' => 'Admin - Orders',
        'layout' => 'admin',
        'page' => 'admin/orders',
      ],
      [
        'orders' => $orders,
        'status' => $status
      ]
    );
  }
}
