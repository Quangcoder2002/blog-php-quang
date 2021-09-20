<?php
  $notification = '';
  if (isset($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    unset($_SESSION['notification']);
  }
include_once('views/includes/Admin/header.php');
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <section class="content-header">

     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>BÀI VIẾT</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="?admin=admin&mod=dashboard&act=index">Trang chủ</a></li>
             <li class="breadcrumb-item"><a href="?admin=admin&mod=post&act=list">Bài viết</a></li>
             <li class="breadcrumb-item active">Chi tiết</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
   <div id="toast" ></div>
   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="card">
       <div class="card-header">
         <h3 class="card-title">Thông tin</h3>

         <div class="card-tools">

         </div>
       </div>
       <div class="card-body">
           <div class="container">
             <h1><?= $temp['title'] ?></h1>
             <h2><?= $temp['short_content'] ?></h2>
             <p><?= $temp['content'] ?></p>
          </div>
         <!-- /.card -->

       </section>
       <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
<?php
include_once('views/includes/Admin/footer.php');
?>
