<?php
require_once('models/Category.php');
require_once('controllers/BaseController.php');
class CategoryController extends BaseController{
  function __construct(){
    if ($_SESSION['is_login']==false) {
      $this->redirect('?admin=admin&mod=auth&act=getFormLogin');
    }
  }
  function list(){
    $model = new Category();
    $temp  = $model->getAll();
     $this->view('category/list',
     ['temp'=>$temp]);
  }
  function detail(){
    $id = $_GET['id'];
    $model = new Category();
    $temp = $model->find($id);
    $this->view('category/detail',['temp'=>$temp]);
  }
  function create(){
    $model = new Category();
    $temps = $model->getParentId();
    $this->view('category/add',
    ['temps'=>$temps]);
  }
  function store(){
      if ($_POST['name']!='' && $_POST['description']!='') {
        $data = $_POST;
        $model = new Category();
        $status = $model->insert($data);
        if ($status==true) {
          $_SESSION['notification']='
            toast({
              title: "Thành công!",
              message: "Tạo mới thành công.",
              type: "success",
              duration: 5000
            });';
            $this->redirect('?admin=admin&mod=category&act=list');
        }else {
          $_SESSION['notification']='
            toast({
              title: "Thất bại!",
              message: "Tạo mới thất bại.",
              type: "error",
              duration: 5000
            });';
              $this->redirect('?admin=admin&mod=category&act=create');
        }
      }else {
        $_SESSION['notification']='
          toast({
            title: "Thất bại!",
            message: "Tạo mới thất bại.",
            type: "error",
            duration: 5000
          });';
            $this->redirect('?admin=admin&mod=category&act=create');;
      }
    }
    function edit(){
      $id = $_GET['id'];
      $model = new Category();
      $category = $model->find($id);
      $categories  = $model->getAll();
      require_once('views/category/edit.php');
    }
    function update(){
      session_start();
      if ($_POST['name']!='' && $_POST['description']!='') {
        $data =$_POST;
        $model = new Category();
        $status = $model->update($data);
        if ($status==true) {
          $_SESSION['notification']='
            toast({
              title: "Thành công!",
              message: "Sửa thành công.",
              type: "success",
              duration: 5000
            });';
            $this->redirect('?admin=admin&mod=category&act=list');
        }else {
          $_SESSION['notification']='
            toast({
              title: "Thất bại!",
              message: "Sửa thất bại.",
              type: "error",
              duration: 5000
            });';
              $this->redirect('?admin=admin&mod=category&act=edit');
        }
      }else {
        $_SESSION['notification']='
          toast({
            title: "Thất bại!",
            message: "Sửa thất bại.",
            type: "error",
            duration: 5000
          });';
            $this->redirect('?admin=admin&mod=category&act=edit');
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
        $this->redirect('?admin=admin&mod=category&act=list');
      }else {
        $_SESSION['notification']='
          toast({
            title: "Thất bại!",
            message: "Xóa thất bại.",
            type: "error",
            duration: 5000
          });';
      }
    }
}

?>
