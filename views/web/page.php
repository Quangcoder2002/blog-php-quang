<?php
 error_reporting(0);
 require_once('views/includes/Client/header.php');
 require_once('models/Conmon.php');
 require_once('models/Connection.php');
      $id = $_GET['id'];
      $sessionKey = 'post_'.$id;
      $sessionView = $_SESSION[$sessionKey];
        if (!$sessionView) {
            $_SESSION[$sessionKey] = 1;
            $obj = new Connection();
            $this->conn = $obj->conn;
            $obj->conn->query('UPDATE posts SET views = views + 1 WHERE id = ' . $id);
          }
 ?>
<section class="tada-container content-posts page post-full-width">


    <!-- CONTENT -->
    <div class="content col-xs-12">


        <!-- ARTICLE 1 -->
        <article>
            <div class="post-text">
              <span class="date"><?= $newDate = date("d/m/Y G:i", strtotime($post['created_at']))?></span>
                <h2><?= $post['title']?></h2>
            </div>
              <div class="post-text text-content">
                <?= $post['content']?>
                <div class="post-by">Viết bởi<?php
                foreach ($users as $user) {
                  if ($post['user_id']==$user['id']) {
                   echo $user['name'];
                 }
                } ?></div>
              <div class="clearfix"></div>
              </div>
        </article>


      </div>

    <div class="clearfix"></div>
  </section>

  <?php
   require_once('views/includes/Client/footer.php');
   ?>
