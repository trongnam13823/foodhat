<?php
class models_Addresses extends Database
{
  protected $table = 'addresses';

  public function selectUser($user_id)
  {
    //1. Create SQL string
    $sql = "SELECT * FROM $this->table WHERE user_id = $user_id";

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
