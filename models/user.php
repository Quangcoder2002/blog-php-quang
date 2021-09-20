
<?php
require_once('Models.php');
class User extends Model{
  function __construct(){
    parent::__construct();
    $this->table = "users";
  }
  function getLogin($email,$password){
    $sql="SELECT * FROM ".$this->table." WHERE email='".$email."' and password='".$password."'";
    return  $this->conn->query($sql)->fetch_assoc();
  }
  function update($data){
    require_once('Conmon.php');
    $upload = uploadFile('avatar', 'publics/img',array('jpg','jpeg','png','gif'), 1, true);
    $_SESSION['upload_status'] = $upload;
    if (isset($_SESSION['upload_status']) && $upload[0] && isset($data)) {
      $sql = "UPDATE ".$this->table." SET name ='".$data['name']."' ,mobile='".$data['mobile']."',address='".$data['address']."',age='".$data['age']."',avatar='".$upload[1]."' WHERE  id = ".$data['id'];
      return $this->conn->query($sql);
    }else {
      $sql = "UPDATE ".$this->table." SET name ='".$data['name']."' ,mobile='".$data['mobile']."',address='".$data['address']."',age='".$data['age']."' WHERE  id = ".$data['id'];
      return $this->conn->query($sql);
    }
  }
}
 ?>
