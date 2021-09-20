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
           <h1>Thống kê</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item active">Trang chủ</li>
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
           <div class="container-full">
             <div class="row">
               <div class="col-lg-4 col-6">
                 <!-- small box -->
                 <div class="small-box bg-info">
                   <div class="inner">
                     <h3><?= count($posts) ?></h3>

                     <p>Tổng số bài viết</p>
                   </div>
                   <div class="icon">
                     <i class="ion ion-bag"></i>
                   </div>
                   <a href="?admin=admin&mod=post&act=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                 <!-- small box -->
                 <div class="small-box bg-success">
                   <div class="inner">
                     <h3><?= count($categories) ?><sup style="font-size: 20px"></sup></h3>

                     <p>Tổng số danh mục</p>
                   </div>
                   <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                   </div>
                   <a href="?admin=admin&mod=Category&act=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                 <!-- small box -->
                 <div class="small-box bg-warning">
                   <div class="inner">
                     <h3><?php
                    $sum=0;
                     foreach ($posts as $post) {
                        $sum=$sum+$post['views'];
                     }
                      echo $sum;?></h3>

                     <p>Tổng số lượt xem</p>
                   </div>
                   <div class="icon">
                     <i class="ion ion-person-add"></i>
                   </div>
                   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
               </div>
               <!-- ./col -->
               <!-- ./col -->
             </div>
             <!-- /.row -->
             <!-- Main row -->
             <div class="row">
               <!-- Left col -->
               <section class="col-lg-7 connectedSortable">
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
