<?php
class Database
{
  protected $conn;
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "foodhat";
  protected $table = "";

  public function __construct()
  {
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
  }

  //1. Create SQL strings
  protected function sqlUpdate($table, $id, $params)
  {
    $sql = "UPDATE $table SET ";
    foreach ($params as $key => $value) {
      $sql .= "$key = '$value', ";
    }
    $sql = rtrim($sql, ', ') . " WHERE id = $id";

    return $sql;
  }

  protected function sqlInsertMany($table, $rows)
  {
    $keys = implode(', ', array_keys($rows[0]));
    $values = '';

    foreach ($rows as $row) {
      $values .= '(';
      foreach ($row as $colValue) {
        $values .= "'$colValue', ";
      }
      $values = rtrim($values, ', ') . '), ';
    }

    $values = rtrim($values, ', ');

    $sql = "INSERT INTO $table ($keys) VALUES $values";

    return $sql;
  }

  protected function sqlInsert($table, $params)
  {
    $keys = implode(', ', array_keys($params));
    $values = '';

    foreach ($params as $value) {
      $values .= "'$value', ";
    }

    $values = rtrim($values, ', ');

    $sql = "INSERT INTO $table ($keys) VALUES ($values)";

    return $sql;
  }

  protected function sqlDelete($table, $id)
  {
    $sql = "DELETE FROM $table WHERE id = $id";

    return $sql;
  }

  //2. Execute SQL strings 
  public function selectAll()
  {
    $sql = "SELECT * FROM $this->table";
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

  public function selectById($id, $column)
  {
    $sql = "SELECT $column FROM $this->table WHERE id = $id";
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

  public function insert($params)
  {
    if (isset($params[0]) && is_array($params[0])) {
      $sql = $this->sqlInsertMany($this->table, $params);
    } else {
      $sql = $this->sqlInsert($this->table, $params);
    }

    try {
      $this->conn->query($sql);
      return [
        'status' => true,
        'conn' => $this->conn,
        'message' => 'Inserted successfully'
      ];
    } catch (Throwable $th) {
      return [
        'status' => false,
        'message' => $th->getMessage()
      ];
    }
  }

  public function update($id, $params)
  {
    $sql = $this->sqlUpdate($this->table, $id, $params);

    try {
      $this->conn->query($sql);
      return [
        'status' => true,
        'message' => 'Updated successfully'
      ];
    } catch (Throwable $th) {
      return [
        'status' => false,
        'message' => $th->getMessage()
      ];
    }
  }

  public function delete($id)
  {
    $sql = $this->sqlDelete($this->table, $id);

    try {
      $this->conn->query($sql);
      return [
        'status' => true,
        'message' => 'Deleted successfully'
      ];
    } catch (Throwable $th) {
      return [
        'status' => false,
        'message' => $th->getMessage()
      ];
    }
  }
}
