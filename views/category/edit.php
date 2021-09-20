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
             <li class="breadcrumb-item"><a href="?admin=admin&mod=category&act=list">Danh mục</a></li>
             <li class="breadcrumb-item active">Chỉnh sửa</li>
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

         </div>
       </div>
       <div class="card-body">
           <div class="container">
             <form action="?admin=admin&mod=category&act=update" method="POST" role="form" enctype="multipart/form-data">
     						<div class="form-group">
     								<label for="">Tên danh mục</label>
     								<input type="hidden" name="id" value="<?= $category['id']?>">
     								<input type="text" class="form-control" id="" value="<?= $category['name'] ?>" name="name">
     						</div>
     						<div class="form-group">
     								<label for="">Mô tả</label>
                    <textarea name="description" class="form-control" id="full" rows="8" cols="80"><?= $category['description'] ?></textarea>
     						</div>
     						<div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="parent_id" class="form-control">
                      <option value="0">Danh mục</option>
                      <?php foreach ( $categories as $cate) {?>
                        <option <?php if($cate['id'] == $category['parent_id']){ echo "selected"; }  ?> value="<?= $cate['id']; ?>"><?= $cate['name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                 <div class="form-group">
     								<label for="">Xem ảnh danh mục cũ</label> <br>
     									<img src="<?= $category['cate_avatar']?>" alt="" width="100px" height="100px">
     									<br>
                     <label for="">Cập nhập ảnh tại đây</label>
                     <input type="file" class="form-control" id="" placeholder="" name="avatar">
                 </div>

     						<button type="submit" class="btn btn-primary">Cập nhật</button>
     				</form>
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
