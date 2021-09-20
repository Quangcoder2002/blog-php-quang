<?php
  // Model
  require_once('Models.php');
  class Category extends Model{
    function __construct(){
      parent::__construct();
      $this->table = "categories";
    }
    function getParentId(){
      $sql = "SELECT * FROM categories WHERE parent_id is Null";
      $results = $this->conn->query($sql);
      $temps = array();
      while($row = $results->fetch_assoc()){
        $temps[] = $row;
      }
      return  $temps;
    }
    function insert($data){
      require_once('Conmon.php');
      $upload = uploadFile('avatar', 'publics/img',array('jpg','jpeg','png','gif'), 10, true);
      $_SESSION['upload_status'] = $upload;
      if (isset($_SESSION['upload_status']) && $_SESSION['upload_status'][0]==true && isset($data)) {
        if (isset($data['parent_id']) && $data['parent_id']!=0) {
          $sql = "INSERT INTO categories (name, description, slug, cate_avatar, parent_id, created_at) VALUES ('".$data['name']."','".$data['description']."','".create_slug($data['name'])."','".$upload[1]."','".$data['parent_id']."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }elseif($data['parent_id']==0){
          $sql = "INSERT INTO categories (name, description, slug, cate_avatar, created_at) VALUES ('".$data['name']."','".$data['description']."','".create_slug($data['name'])."','".$upload[1]."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }
        }else {
        if (isset($data['parent_id']) && $data['parent_id']!=0) {
          $sql = "INSERT INTO categories (name, description, slug, parent_id,created_at) VALUES ('".$data['name']."','".$data['description']."','".create_slug($data['name'])."','".$data['parent_id']."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }elseif($data['parent_id']==0){
          $sql = "INSERT INTO categories (name, description, slug,created_at) VALUES ('".$data['name']."','".$data['description']."','".create_slug($data['name'])."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }
      }
    }
    function update($data){
      require_once('Conmon.php');
      $upload = uploadFile('avatar', 'publics/img',array('jpg','jpeg','png','gif'), 1, true);
      $_SESSION['upload_status'] = $upload;

      if (isset($_SESSION['upload_status']) && $_SESSION['upload_status'][0]==true && isset($data)) {
        if (isset($data['parent_id']) && $data['parent_id']!=0) {
          $sql = "UPDATE categories SET name ='".$data['name']."' ,slug ='".create_slug($data['name'])."' ,description='".$data['description']."' ,cate_avatar='".$upload[1]."' ,parent_id='".$data['parent_id']."' WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }elseif($data['parent_id']==0){
          $sql = "UPDATE categories SET name ='".$data['name']."' ,slug ='".create_slug($data['name'])."' ,description='".$data['description']."' ,cate_avatar='".$upload[1]."',parent_id= NULL WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }
      }else {
        if (isset($data['parent_id']) && $data['parent_id']!=0) {
          $sql = "UPDATE categories SET name ='".$data['name']."' ,slug ='".create_slug($data['name'])."' ,description='".$data['description']."' ,parent_id='".$data['parent_id']."' WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }elseif($data['parent_id']==0){
          $sql = "UPDATE categories SET name ='".$data['name']."' ,slug ='".create_slug($data['name'])."' ,description='".$data['description']."',parent_id= NULL WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }
      }
    }
  }
?>
