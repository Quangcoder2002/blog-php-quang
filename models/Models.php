<?php
require_once('Connection.php');
class Model{
  var $conn;
  var $table;
  var $temp;
  function __construct(){
    $obj = new Connection();
    $this->conn = $obj->conn;

  }
  function getAll(){
    $sql = "SELECT * FROM ".$this->table;
    $results = $this->conn->query($sql);
    $temp = array();
    while($row = $results->fetch_assoc()){
      $temp[] = $row;
    }
    return $temp;
  }
  function find($id){
    $sql = "SELECT * FROM ".$this->table." WHERE id = ".$id;
    return $this->conn->query($sql)->fetch_assoc();
  }
  function delete($id){
    $sql= "DELETE FROM ".$this->table." WHERE id =".$id;
    return $this->conn->query($sql);
  }
}
?>
