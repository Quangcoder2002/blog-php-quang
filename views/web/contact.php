<?php
 require_once('views/includes/Client/header.php');
 ?>
<!-- *****************************************************************
** Section ***********************************************************
****************************************************************** -->

<section class="tada-container content-posts page post-right-sidebar">


<!-- CONTENT -->
<div class="content col-xs-8">


   <!-- ARTICLE 1 -->
   <article>
       <div class="post-image">
           <img src="publics/Client/img/img-contact.jpg" alt="contact image">
         </div>
         <div class="post-text">
             <h2>Liên hệ với chúng tôi</h2>
         </div>
         <div class="post-text text-content">
           <div class="text"><p>Sed ut massa tristique, vehicula tellus in, fringilla ligula. Phasellus dignissim est sed egestas fringilla. Vivamus egestas nec dolor vitae egestas. Nulla a ante odio. Vestibulum lobortis tincidunt nulla non varius. Fusce ornare, ante nec ullamcorper scelerisque.</p>
             <br><ul class="bullet">
               <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                 <li>Integer lorem quam, interdum id nulla vel, varius lacinia metus</li>
                 <li>Nunc quis elit scelerisque, dapibus sem et, venenatis nunc</li>
                 <li>Proin eu laoreet augue. Aenean at rutrum nibh</li>
             </ul>
             <p>Nullam tristique massa faucibus, sodales sapien ac, tincidunt dolor. Quisque ut lobortis lectus, non suscipit ante. Duis lectus metus, consequat vitae ante et, ullamcorper scelerisque nisl.</p>
             </div>
         </div>
         <form class="comment-form" action='?admin=client&mod=home&act=send' method="POST" role="form" enctype="multipart/form-data">
             <span class="field-name">Họ tên</span>
             <input type="text" class="name" name="name">
             <span class="field-name">Email</span>
             <input type="text" class="email" name="email">
             <span class="field-name">Nghề ngiệp</span>
             <input type="text" class="subject" name="subject">
             <span class="field-name">Ý kiến</span>
             <textarea class="message" name="message"></textarea>
             <button type="submit">Gửi</button>
         </form>

   </article>


 </div>


 <!-- SIDEBAR -->
 <div class="sidebar col-xs-4">


     <!-- ABOUT ME -->
     <div class="widget about-me">
       <div class="ab-image">
           <img src="publics/Client/img/about-me.jpg" alt="about me">
             <div class="ab-title">About Me</div>
         </div>
         <div class="ad-text">
           <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
             <span class="signing"><img src="publics/Client/img/signing.png" alt="signing"></span>
         </div>
     </div>


     <!-- LATEST POSTS -->
     <div class="widget latest-posts">
       <h3 class="widget-title">
           Latest Posts
         </h3>
         <div class="posts-container">
           <?php foreach ($posts as $post): ?>

              <div class="item">
                 <img src="<?= $post['thumbnail']?>" width="100px" height="90px" alt="post 1" class="post-image">
                   <div class="info-post">
                     <h5><a href="?admin=client&mod=home&act=page&id=<?= $post['id']?>"><?= $post['title']?></h5>
                     <span class="date"><?= time_stamp(strtotime($post['created_at'])) ?></span>
                   </div>
                   <div class="clearfix"></div>
                </div>

           <?php endforeach; ?>

             <div class="clearfix"></div>
         </div>
     </div>



     <!-- ADVERTISING -->

 </div> <!-- #SIDEBAR -->

<div class="clearfix"></div>


</section>

<?php
 require_once('views/includes/Client/footer.php');
 ?>
