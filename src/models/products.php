<?php
class models_Products extends Database
{
  protected $table = 'products';

  public function selectAll()
  {
    //1. Create SQL string
    $sql = "
    SELECT
      products.active AS active,
      products.id AS product_id,
      products.thumbnail AS thumbnail,
      products.name AS name,
      products.price AS price,
      products.offer AS offer,
      categories.id AS category_id,
      categories.name AS category_name                           
    FROM
      products
    JOIN
      categories ON products.category_id = categories.id 
    ORDER BY products.id DESC;
    ";

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

  public function selectActive()
  {
    //1. Create SQL string
    $sql = "
    SELECT
      products.active AS active,
      products.id AS product_id,
      products.thumbnail AS thumbnail,
      products.name AS name,
      products.price AS price,
      products.offer AS offer,
      categories.id AS category_id,
      categories.name AS category_name                           
    FROM
      products
    JOIN
      categories ON products.category_id = categories.id 
    WHERE 
      products.active = 1
    ORDER BY products.id DESC;
    ";

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

  public function selectActiveByCategory($id)
  {
    //1. Create SQL string
    $sql = "
    SELECT
      products.active AS active,
      products.id AS product_id,
      products.thumbnail AS thumbnail,
      products.name AS name,
      products.price AS price,
      products.offer AS offer,
      categories.id AS category_id,
      categories.name AS category_name                           
    FROM
      products
    JOIN
      categories ON products.category_id = categories.id 
    WHERE 
      products.active = 1
      AND products.category_id = $id
    ORDER BY products.id DESC;
    ";

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
