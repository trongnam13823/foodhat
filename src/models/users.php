<?php
class models_Users extends Database
{
  protected $table = 'users';
  public function register($params)
  {
    //1. Create SQL string
    $sql = $this->sqlInsert($this->table, $params);

    //2. Execute SQL string
    try {
      $this->conn->query($sql);
      return [
        'status' => true,
        'message' => 'Register successfully'
      ];
    } catch (Throwable $th) {
      return [
        'status' => false,
        'message' => $th->getMessage()
      ];
    }
  }

  public function login($phone, $password)
  {
    //1. Create SQL string
    $sql = "SELECT id, name, phone, avatar, is_admin FROM $this->table WHERE phone = '$phone' AND password = '$password'";

    //2. Execute SQL string
    try {
      $res = $this->conn->query($sql);

      //3. Check if user exist
      if ($res->num_rows === 1) {
        $_SESSION['user'] = $res->fetch_assoc();

        return [
          'status' => true,
          'message' => 'Login successfully',
        ];
      } else {
        return [
          'status' => false,
          'message' => 'Invalid email or password',
        ];
      }
    } catch (Throwable $th) {
      return [
        'status' => false,
        'message' => $th->getMessage()
      ];
    }
  }

  public function update($id, $param)
  {
    //1. Create SQL string
    $sql = $this->sqlUpdate($this->table, $id, $param);

    //2. Execute SQL string
    try {
      $this->conn->query($sql);

      foreach ($param as $key => $value) {
        $_SESSION['user'][$key] = $value;
      }

      return [
        'status' => true,
        'message' => 'Update successfully'
      ];
    } catch (Throwable $th) {
      return [
        'status' => false,
        'message' => $th->getMessage()
      ];
    }
  }
}
