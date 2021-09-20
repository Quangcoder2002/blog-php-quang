<?php
require_once('controllers/BaseController.php');
require_once('models/Category.php');
require_once('models/Post.php');
require_once('models/user.php');
require_once('models/Conmon.php');
require_once('models/sendEmail.php');

class HomeController extends BaseController
{
  function index()
  {
    $page = isset($_GET['page'])  ? $_GET['page'] : 1;
    $model_user = new User();
    $users = $model_user->getAll();
    $model_cate = new Category();
    $categories  = $model_cate->getAll();
    $model_post = new Post();
    $posts  = $model_post->limitPosts($page,2);
    $posts_count = $model_post->getAll();
    function views_sort($a, $b) {
    return $b['views'] - $a['views'];
    }
    usort($posts, "views_sort");
    $this->view('web/home',[
      'posts'=>$posts,
      'categories'=>$categories,
      'users'=>$users,
      'posts_count'=>$posts_count
    ]);
  }
  function contact()
  {
    $model_post = new Post();
    $posts  = $model_post->limitPosts(0,5);
    $model_cate = new Category();
    $categories  = $model_cate->getAll();
    $this->view('web/contact',[
        'categories'=>$categories,
        'posts'=>$posts
    ]);
  }
  function about()
  {
    $model_post = new Post();
    $posts  = $model_post->limitPosts(0,5);
    $model_cate = new Category();
    $categories  = $model_cate->getAll();
    $this->view('web/about',[
        'posts'=>$posts,
        'categories'=>$categories
    ]);
  }
  function page()
  {
    $model_cate = new Category();
    $categories  = $model_cate->getAll();
    $model_user = new User();
    $users =$model_user->getAll();
    $model = new Post();
    $id = $_GET['id'];
    $post = $model->find($id);
    $this->view('web/page',[
      'categories'=>$categories,
      'post'=>$post,
      'users'=>$users
    ]);
  }
  function categories()
  {
    $id = $_GET['id'];

    $model_user = new User();
    $users =$model_user->getAll();
    $model_cate = new Category();
    $categories = $model_cate->getAll();
    $model_post = new Post();
    $posts = $model_post->getAll();
    $this->view('web/categories',[
      'categories'=>$categories,
      'posts'=>$posts,
      'users'=>$users,
    ]);
  }
  function send(){

    				$check = send_email($_POST['email'],$_POST['name'],$_POST['message'],$_POST['subject']);
    					if ($check) {
    								$this->redirect("?admin=client&mod=home&act=index");
    					}else {
    							$this->redirect("?admin=client&mod=home&act=contact");
    					}
    	}

}
?>
