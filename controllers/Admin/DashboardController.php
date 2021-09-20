<?php
require_once('controllers/BaseController.php');
require_once('models/Dashboard.php');
require_once('models/Post.php');
require_once('models/Category.php');
class DashboardController extends BaseController{
  function __construct(){
    if ($_SESSION['is_login']==false) {
        $this->redirect('?admin=admin&mod=auth&act=getFormLogin');
    }
  }
  function index(){
    $model_post = new Post();
    $posts = $model_post->getAll();
    $model_cate = new Category();
    $categories = $model_cate->getAll();
    $this->view('bashboard',[
      'posts'=>$posts,
      'categories'=>$categories
    ]);
  }

}
 ?>
