<?php
class BaseController
{
    function view($view,$data = [])
    {
      extract($data);
      require_once('views/'.$view.'.php');
    }

    function redirect($path){
      header('Location: '.$path);
    }
    function back(){
      $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
 ?>
