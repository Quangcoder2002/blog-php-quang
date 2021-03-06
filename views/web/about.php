<?php
 require_once('views/includes/Client/header.php');
 ?>

 <section class="tada-container content-posts page post-right-sidebar">

     <!-- CONTENT -->
     <div class="content col-xs-8">


         <!-- ARTICLE 1 -->
         <article>
             <div class="post-image">
                 <img src="publics/Client/img/img-post-1.jpg" alt="post image 1">
               </div>
               <div class="post-text">
                   <h2>Tiêu Đề </h2>
               </div>
               <div class="post-text text-content">
                 <div class="text"><p>Sed ut massa tristique, vehicula tellus in, fringilla ligula. Phasellus dignissim est sed egestas fringilla. Vivamus egestas nec dolor vitae egestas. Nulla a ante odio. Vestibulum lobortis tincidunt nulla non varius. Fusce ornare, ante nec ullamcorper scelerisque, <a href="#">nisl erat sollicitudin lacus</a>, ac sodales ligula sem eu risus. Fusce laoreet interdum eros, nec finibus mi rutrum eu.
         <br><br>
         Nulla at sem in nisi pulvinar porta consequat a quam. Proin vehicula placerat est, vulputate dapibus elit scelerisque sit amet. Sed at condimentum justo, accumsan molestie ligula. Phasellus porttitor urna sit amet lorem rutrum luctus ut molestie nulla. Nulla facilisi. Pellentesque quis nibh ut arcu bibendum tincidunt.
         </p>
                   <ul class="bullet">
                     <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                       <li>Integer lorem quam, interdum id nulla vel, varius lacinia metus</li>
                       <li>Nunc quis elit scelerisque, dapibus sem et, venenatis nunc</li>
                       <li>Proin eu laoreet augue. Aenean at rutrum nibh</li>
                   </ul>
                   <p>Nullam tristique massa faucibus, sodales sapien ac, tincidunt dolor. Quisque ut lobortis lectus, non suscipit ante. Duis lectus metus, consequat vitae ante et, ullamcorper scelerisque nisl.
         <br><br>
         Nullam tristique massa faucibus, sodales sapien ac, tincidunt dolor. Quisque ut lobortis lectus, non suscipit ante. Phasellus et aliquet velit. Donec in dui vitae tellus sodales dapibus non quis libero.
                   Quisque nec tortor ac ligula sagittis rutrum in a felis.
                 <br><br>
                   <quote>“ Vestibulum at justo ante. Fusce finibus pretium aliquam. Sed pharetra purus at augue faucibus sagittis.
                   Interdum et malesuada fames ac ante ipsum primis in faucibus. ”</quote><br><br>
                   Quisque euismod sapien vel neque tincidunt vulputate. Duis nulla elit, mollis eu fringilla euinterdum vel libero.
                   Phasellus quis felis tempor, vulputate juquis, ullamcorper nisi.</p>
                   <div class="clearfix"></div>
                   </div>
               </div>


         </article>


       </div>


       <!-- SIDEBAR -->
       <div class="sidebar col-xs-4">


           <!-- ABOUT ME -->
           <div class="widget about-me">
             <div class="ab-image">
                 <img src="publics/Client/img/about-me.jpg" alt="about me">
                   <div class="ab-title">Chúng tôi</div>
               </div>
               <div class="ad-text">
                 <p>Tôi rất vui..........</p>
                   <span class="signing"><img src="img/signing.png" alt="signing"></span>
               </div>
           </div>


           <!-- LATEST POSTS -->
           <div class="widget latest-posts">
             <h3 class="widget-title">
                 Bài viết
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
         	<div class="clearfix"></div>
   </section>

 <?php
  require_once('views/includes/Client/footer.php');
  ?>
