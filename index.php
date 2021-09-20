<?php

session_start();
  date_default_timezone_set('Asia/Ho_Chi_Minh');
//  if (isset($_SESSION['auth']) && isset($_SESSION['is_login'])) {
//    $_SESSION['auth']='';
  //  $_SESSION['is_login']=false;
  //}
  $admin = isset($_GET['admin']) ? $_GET['admin'] : 'client';
  $mod = isset($_GET['mod'])  ? $_GET['mod'] : 'home';
  $act = isset($_GET['act'])  ? $_GET['act'] : 'index';

  $controllerClassName = ucfirst($mod).'Controller';
  $path = 'controllers/'.ucfirst($admin).'/'.$controllerClassName.'.php';

  if (!file_exists($path)) {
    echo "Url ko tồn tại".$path;
    exit();
  }
  require_once($path);
  $controllerObj = new $controllerClassName();

  if (!method_exists($controllerObj,$act)) {
    echo "Chức năng ko tồn tại".$act;
    exit();
  }
  $controllerObj->$act();
  ?>
