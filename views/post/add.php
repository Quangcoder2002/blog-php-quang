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
           <h1>Bài viết mới</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="?admin=admin&mod=dashboard&act=index">Trang chủ</a></li>
             <li class="breadcrumb-item"><a href="?admin=admin&mod=post&act=list">Bài viết</a></li>
             <li class="breadcrumb-item active">Tạo bài viết mới</li>
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
               <form action="?admin=admin&mod=post&act=store" method="POST" role="form" enctype="multipart/form-data">
                   <div class="form-group">
                       <label for="">Tiêu đề</label>
                       <input type="text" class="form-control" id="" placeholder="" name="title">
                   </div>
                   <div class="form-group">
                       <label for="">Mô tả</label>
                       <input type="text" class="form-control" id="" placeholder="" name="short_content">
                   </div>
                   <div class="form-group">
                       <label for="">Nội dung</label><br>
                       <textarea name="content" id="full" class="form-control" rows="8" cols="80"></textarea>
                   </div>
                   <div class="form-group">
                      <label for="">Danh mục</label>
                      <select name="category_id" class="form-control">
                        <option value="0">Danh mục</option>
                        <?php foreach ( $categories as $cate) {?>
                          <option value="<?= $cate['id']; ?>"><?= $cate['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group ">
                        <label for="">Ảnh bài viết</label>
                        <input type="file" class="form-control" name="thumbnail">
                    </div>
                   <button type="submit" class="btn btn-primary">Tạo bài viết</button>
               </form>
           </div>
       </div>
       <!-- /.card-body -->
       <div class="card-footer">

       </div>
       <!-- /.card-footer-->
     </div>
     <!-- /.card -->

   </section>
   <!-- /.content -->
 </div>
  <!-- /.content-wrapper -->

<?php
include_once('views/includes/Admin/footer.php');
 ?>
