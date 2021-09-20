<?php
require_once('models/user.php');
require_once('controllers/BaseController.php');
class UserController extends BaseController{
  function __construct(){
    if ($_SESSION['is_login']==false) {
      $this->redirect('?admin=admin&mod=auth&act=getFormLogin');
    }
  }
  function info(){
    $model = new User();
    $user = $model->find($_SESSION['auth']['id']);
    $this->view('user/info',['user'=>$user]);
  }
  function update(){
    if ($_POST['name']!='' && $_POST['mobile']!='') {
      $data = $_POST;
      $model = new User();
      $status = $model->update($data);
      if ($status==true) {
        $_SESSION['notification']='
          toast({
            title: "Thành công!",
            message: "Sửa thành công.",
            type: "success",
            duration: 5000
          });';
          $_SESSION['auth'] = $model->find($_SESSION['auth']['id']);
          $this->redirect('?admin=admin&mod=user&act=info');
      }else {
        $_SESSION['notification']='
          toast({
            title: "Thất bại!",
            message: "Sửa thất bại.",
            type: "error",
            duration: 5000
          });';
          $this->redirect('?admin=admin&mod=user&act=info');
      }
    }
  }
}
