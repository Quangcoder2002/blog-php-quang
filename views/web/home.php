<?php
 require_once('views/includes/Client/header.php');
 require_once('models/Conmon.php');
 $page = isset($_GET['page'])  ? $_GET['page'] : 1;
 $next =$page+1;
 $count =sizeof($posts_count);
 if (ceil($count/2) <= $next) {
   $next = ceil($count/2);
 }
 $prev =$page-1;
 if ($prev<=0) {
   $prev = 1;
 }

 ?>
 <section class="tada-container content-posts blog-1-column">
     <!-- CONTENT -->
     <div class="content col-xs-12">

         <!-- ARTICLE 1 -->
          <?php foreach ($posts as $post) { ?>
         <article>
             <div class="post-image">
                 <img src="<?= $post['thumbnail']?>" alt="post image 1">

                    <div class="category"><a href="#">
                      <?php foreach ($categories as $category) { ?>
                        <?php if ($category['id']==$post['category_id']) {echo $category['name'];} ?>
                      <?php } ?>
                    </a></div>

                </div>
                <div class="post-text">
                 <span class="date"><?= time_stamp(strtotime($post['created_at'])) ?></span>
                    <h2><a href="?admin=client&mod=home&act=page&id=<?= $post['id']?>"><?= $post['title']?></a></h2>
                    <p class="text"><?= $post['short_content']?><a href="?admin=client&mod=home&act=page&id=<?= $post['id']?>"><i class="icon-arrow-right2"></i></a></p>
                </div>
                <div class="post-info">
                 <div class="post-by">Viết bởi
                   <?php
                   foreach ($users as $user) {
                     if ($post['user_id']==$user['id']) {
                      echo $user['name'];
                    }
                   } ?></div>
                    <div class="extra-info">
                     <a href="#"><i class="icon-facebook5"></i></a>
                   <a href="#"><i class="icon-twitter4"></i></a>
                   <a href="#"><i class="icon-google-plus"></i></a>
                        <span class="comments"><?= $post['views'];?> Lượt xem</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>
            <?php } ?>
         <!-- NAVIGATION -->
         <div class="navigation">
             <a href="?admin=client&mod=home&act=index&page=<?= $prev ?>" class="prev"><i class="icon-arrow-left8"></i></a>

             <a href="?admin=client&mod=home&act=index&page=<?= $next ?>" class="next"><i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>
            </div>
        </div>

       <div class="clearfix"></div>


    </section>

<?php
 require_once('views/includes/Client/footer.php');
 ?>
