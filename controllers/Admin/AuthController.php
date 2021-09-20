<?php
  require_once('models/user.php');
  require_once('controllers/BaseController.php');
  class AuthController extends BaseController
  {
    function login(){
        $data= $_POST;
        $model = new User();
        $user = $model->getLogin($data['email'],md5($data['password']));
        if($user){
          $_SESSION['auth'] = $user;
          $_SESSION['is_login']=true;
          $this->redirect('?admin=admin&mod=dashboard&act=index');
        }else {
            $this->back();
        }
      }
        function getFormLogin(){
          if (isset($_SESSION['auth'])) {
            $this->redirect('?admin=admin&mod=dashboard&act=index');
          }
            $this->view('auth/login');
          }
          function logout(){
            unset($_SESSION['auth']);
            $_SESSION['is_login']=false;
            $this->redirect('?admin=admin&mod=dashboard&act=index');
          }

    }

 ?>
