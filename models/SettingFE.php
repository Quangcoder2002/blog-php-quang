<?php
  // Model
  require_once('Models.php');
  class Config extends Model{
    function __construct(){
      parent::__construct();
    }
    function getAll(){
      $this->table="config_slider";
      $sql = "SELECT * FROM ".$this->table;
      $results = $this->conn->query($sql);
      $temp = array();
      while($row = $results->fetch_assoc()){
        $temp[] = $row;
      }
      return $temp;
    }
  }
?>
