<?php
class models_Orders extends Database
{
  protected $table = 'orders';

  public function selectAll()
  {
    //1. Create SQL string
    $sql = "SELECT orders.*, users.name AS user_name, order_status.name AS status_name FROM orders JOIN users ON orders.user_id = users.id JOIN order_status ON orders.status_id = order_status.id ORDER BY id DESC";

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

  public function selectByUserId($id)
  {
    //1. Create SQL string
    $sql = "SELECT orders.*, order_status.name AS status_name FROM orders JOIN order_status ON orders.status_id = order_status.id WHERE user_id = $id ORDER BY id DESC";

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

  public function filter($status, $date, $search)
  {
    //1. Create SQL string
    $sql = "SELECT orders.*, users.name AS user_name, order_status.name AS status_name FROM orders JOIN users ON orders.user_id = users.id JOIN order_status ON orders.status_id = order_status.id WHERE";

    // filter by status
    if ($status !== 'all') {
      $sql .= " order_status.name = '$status' AND";
    }

    // filter by date
    if ($date !== 'all') {
      if ($date === 'Today') {
        $sql .= " DATE(date) = CURDATE() AND";
      } elseif ($date === 'This Week') {
        $sql .= " YEARWEEK(date, 1) = YEARWEEK(CURDATE(), 1) AND";
      } elseif ($date === 'This Month') {
        $sql .= " YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) AND";
      }
    }

    // filter by search
    $sql .= " (users.name LIKE '%$search%' OR orders.id LIKE '%$search%')";

    // sort by id
    $sql .= " ORDER BY id DESC";

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
