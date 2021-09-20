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
           <h1>DANH MỤC</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="?admin=admin&mod=dashboard&act=index">Trang chủ</a></li>
             <li class="breadcrumb-item active">Danh mục</li>
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
           <a href="?admin=admin&mod=category&act=create" class="btn btn-primary">Tạo danh mục</a>
         </div>
       </div>
       <div class="card-body">
           <div class="container">
             <br>
             <table class="table table-hover">
                 <thead>
                     <th>ID</th>
                     <th>Tên danh mục</th>
                     <th>Ảnh danh mục</th>
                     <th>Mô tả</th>
                     <th>Hành đông</th>
                 </thead>
                 <?php foreach ($temp as $cate) { ?>
                 <tr>
                     <td><?= $cate['id'] ?></td>
                     <td><?= $cate['name'] ?></td>
                     <td>
                         <img src="<?= $cate['cate_avatar'] ?>" width="100px" height="100px">
                     </td>
                     <td><?= $cate['description'] ?></td>
                     <td>
                         <a href="?admin=admin&mod=category&act=detail&id=<?= $cate['id']?>" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                         <a href="?admin=admin&mod=category&act=edit&id=<?= $cate['id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                         <a href="?admin=admin&mod=category&act=delete&id=<?= $cate['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
