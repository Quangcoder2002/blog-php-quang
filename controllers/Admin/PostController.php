<?php
require_once('models/Post.php');
require_once('models/Category.php');
require_once('controllers/BaseController.php');
class PostController extends BaseController{
  function __construct(){
    if ($_SESSION['is_login']==false) {
      $this->redirect('?admin=admin&mod=auth&act=getFormLogin');
    }
  }
    function list(){
      $model = new Post();
      $temps  = $model->getAll();
      $this->view('post/list',
      ['temps'=>$temps]);
    }

    function detail(){
      $model = new Post();
      $id = $_GET['id'];
      $temp = $model->find($id);
      $this->view('post/detail',
       ['temp'=>$temp]);
    }

    function create(){
      $model = new Category();
      $categories = $model->getAll();
      $this->view('post/add',
       ['categories'=>$categories]);
    }

    function store(){
      $a=$_POST['title'];
      $_POST['title']=addcslashes("$a", "''");
      $data = $_POST;
      $model = new Post();
      $status = $model->insert($data);
      if ($status==true) {
        $_SESSION['notification']='
          toast({
            title: "Thành công!",
            message: "Thêm thành công.",
            type: "success",
            duration: 5000
          });';
        $this->redirect('?admin=admin&mod=post&act=list');
      }else {
        $_SESSION['notification']='
          toast({
            title: "Thất bại!",
            message: "Xóa thất bại.",
            type: "error",
            duration: 5000
          });';
          $this->redirect('?admin=admin&mod=post&act=create');
      };
    }
    function edit(){
      $id = $_GET['id'];
      $model = new Post();
      $model_cate = new Category();
      $post = $model->find($id);
      $categories  = $model_cate->getAll();
      $this->view('post/edit',[
        'post'=>$post,
        'categories'=>$categories
      ]);
    }
    function update(){
      $a=$_POST['title'];
      $_POST['title']=addcslashes("$a", "''");
      $data =$_POST;
      $model = new Post();
      $status = $model->update($data);
      if ($status==true) {
        $_SESSION['notification']='
          toast({
            title: "Thành công!",
            message: "Sửa thành công.",
            type: "success",
            duration: 5000
          });';
          $this->redirect('?admin=admin&mod=post&act=list');
      }else {
        $_SESSION['notification']='
          toast({
            title: "Thất bại!",
            message: "Sửa thất bại.",
            type: "error",
            duration: 5000
          });';
          $this->redirect('?admin=admin&mod=post&act=edit');
      }
    }
    function delete(){
      session_start();
      $id = $_GET['id'];
      $model = new Category();
      $status = $model->delete($id);
      if ($status==true) {
        $_SESSION['notification']='
          toast({
            title: "Thành công!",
            message: "Xóa thành công.",
            type: "success",
            duration: 5000
          });';
        $this->redirect('?admin=admin&mod=post&act=list');
      }else {
        $_SESSION['notification']='
          toast({
            title: "Thất bại!",
            message: "Xóa thất bại.",
            type: "error",
            duration: 5000
          });';
          $this->redirect('?admin=admin&mod=post&act=list');
      }
    }
  }
 ?>
