<?php
class api_Orders extends Controller
{
  function insert()
  {
    //1. Get order data from request
    $order = json_decode(file_get_contents('php://input'), true);

    //2. Validate order
    if ($order === null) {
      echo json_encode([
        'status' => false,
        'message' => 'Invalid request'
      ]);
      return;
    }

    //3. Model
    $modelOrders = $this->model('Orders');
    $modelOrderItems = $this->model('Order_Items');

    //4. Get and remove items from order
    $items = $order['items'];
    unset($order['items']);

    //5. Insert order
    $res = $modelOrders->insert($order);
    if (!$res['status']) {
      echo json_encode($res);
      return;
    }

    //6. Get and set order id for items
    $orderId = $res['conn']->insert_id;

    foreach ($items as &$item) {
      $item['order_id'] = $orderId;
    }

    //7. Insert items
    $res = $modelOrderItems->insert($items);

    if ($res['status']) {
      unset($res['conn']);
      $res['message'] = 'Order placed successfully';
    }

    //8. Response message
    echo json_encode($res);
  }
}
