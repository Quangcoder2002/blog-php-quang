<?php
  // Model
  require_once('Models.php');
  class Post extends Model{
    function __construct(){
      parent::__construct();
      $this->table = "posts";
    }
    function limitPosts($record,$i){
      $sql = "SELECT * FROM posts LIMIT ".$record.",".$i;
      $results = $this->conn->query($sql);
      $posts = array();
      while($row = $results->fetch_assoc()){
        $posts[] = $row;
      }
      return  $posts;
    }
    function getCategoriesId(){
        $sql = "SELECT * FROM categories";
        $results = $this->conn->query($sql);
        $categories = array();
        while($row = $results->fetch_assoc()){
          $categories[] = $row;
        }
        return  $categories;
    }

    function insert($data){
      require_once('Conmon.php');

      $upload = uploadFile('thumbnail', 'publics/img',array('jpg','jpeg','png','gif'), 1, true);
      $_SESSION['upload_status'] = $upload;

      if (isset($_SESSION['upload_status'])&& $_SESSION['upload_status'][0]==true  && isset($data)) {
        if (isset($data['category_id']) && $data['category_id']!=0) {
          $sql = "INSERT INTO posts (title, short_content, slug, thumbnail, category_id, content,user_id, created_at) VALUES ('".$data['title']."','".$data['short_content']."','".create_slug($data['title'])."','".$upload[1]."','".$data['category_id']."','".$data['content']."','".$_SESSION['auth']['id']."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }elseif($data['category_id']==0){
          $sql = "INSERT INTO posts (title, short_content, slug, thumbnail, content,user_id, created_at) VALUES ('".$data['title']."','".$data['short_content']."','".create_slug($data['title'])."','".$upload[1]."','".$data['content']."','".$_SESSION['auth']['id']."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }
      }else {
        if (isset($data['category_id']) && $data['category_id']!=0) {
          $sql = "INSERT INTO posts (title, short_content, slug, category_id, content,user_id, created_at) VALUES ('".$data['title']."','".$data['short_content']."','".create_slug($data['title'])."','".$data['category_id']."','".$data['content']."','".$_SESSION['auth']['id']."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }elseif($data['category_id']==0){
          $sql = "INSERT INTO posts (title, short_content, slug, content,user_id, created_at) VALUES ('".$data['title']."','".$data['short_content']."','".create_slug($data['title'])."','".$data['content']."','".$_SESSION['auth']['id']."',CURRENT_TIMESTAMP())";
          return $this->conn->query($sql);
        }
      }
    }

    function update($data){
      require_once('conmon.php');
      $upload = uploadFile('thumbnail', 'publics/img',array('jpg','jpeg','png','gif'), 10, true);
      $_SESSION['upload_status'] = $upload;
      if (isset($_SESSION['upload_status']) && $_SESSION['upload_status'][0]==true && isset($data)) {
        if (isset($data['category_id']) && $data['category_id']!=0) {
          $sql = "UPDATE posts SET title ='".$data['title']."' ,slug ='".create_slug($data['title'])."' ,short_content='".$data['short_content']."' ,thumbnail='".$upload[1]."' ,category_id='".$data['category_id']."',content='".$data['content']."',update_at=CURRENT_TIMESTAMP() WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }elseif($data['category_id']==0){
          $sql = "UPDATE posts SET title ='".$data['title']."' ,slug ='".create_slug($data['title'])."' ,short_content='".$data['short_content']."' ,thumbnail='".$upload[1]."',category_id= NULL ,content='".$data['content']."',update_at=CURRENT_TIMESTAMP() WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }
      }else {
        if (isset($data['category_id']) && $data['category_id']!=0) {
          $sql = "UPDATE posts SET title ='".$data['title']."' ,slug ='".create_slug($data['title'])."' ,short_content='".$data['short_content']."' ,category_id='".$data['category_id']."',content='".$data['content']."',update_at=CURRENT_TIMESTAMP() WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }elseif($data['category_id']==0){
          $sql = "UPDATE posts SET title ='".$data['title']."' ,slug ='".create_slug($data['title'])."' ,short_content='".$data['short_content']."' ,category_id= NULL,content='".$data['content']."',update_at=CURRENT_TIMESTAMP() WHERE  id = ".$data['id'];
          return $this->conn->query($sql);
        }
      }
    }
  }
?>
