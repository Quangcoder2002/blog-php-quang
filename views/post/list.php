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
             <li class="breadcrumb-item active">Bài viết</li>
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
         <h3 class="card-title">Danh sách</h3>
         <div class="card-tools">
           <a href="?admin=admin&mod=post&act=create" class="btn btn-primary">Tạo bài viết mới</a>
         </div>
       </div>
       <div class="card-body">
           <div class="container">
             <br>
             <table class="table table-hover">
                 <thead>
                     <th>ID</th>
                     <th>Tiêu đề</th>
                     <th>Ảnh</th>
                     <th>Mô tả</th>
                     <th>Action</th>
                 </thead>
                 <?php foreach ($temps as $post) { ?>
                 <tr>
                     <td><?= $post['id'] ?></td>
                     <td><?= $post['title'] ?></td>
                     <td>
                         <img src="<?= $post['thumbnail'] ?>" width="100px" height="100px">
                     </td>
                     <td><?= $post['short_content'] ?></td>
                     <td>
                         <a href="?admin=admin&mod=post&act=detail&id=<?= $post['id']?>" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                         <a href="?admin=admin&mod=post&act=edit&id=<?= $post['id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                         <a href="?admin=admin&mod=post&act=delete&id=<?= $post['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                     </td>
                 </tr>
                 <?php } ?>
             </table>
           </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->

   </section>
   <!-- /.content -->
 </div>
  <!-- /.content-wrapper -->

<?php
include_once('views/includes/Admin/footer.php');
 ?>
