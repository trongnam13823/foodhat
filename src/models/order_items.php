<?php
class models_Order_Items extends Database
{
  protected $table = 'order_items';

  public function selectByOrderId($id)
  {

    //1. Create SQL string
    $sql = "SELECT order_items.*, products.name AS product_name FROM order_items JOIN products ON order_items.product_id = products.id WHERE order_id = $id";

    //2. Execute SQL string
    try {
      $res = $this->conn->query($sql);
      return [
        'status' => true,
        'data' => $res->fetch_all(MYSQLI_ASSOC)
      ];
    } catch (Throwable $th) {
      return [
        'status' => false,
        'message' => $th->getMessage()
      ];
    }
  }
}
