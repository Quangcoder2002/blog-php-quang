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
           <h1>Thông tin người dùng</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
             <li class="breadcrumb-item active">Thông tin người dùng</li>
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
             <form action="?admin=admin&mod=user&act=update" method="POST" role="form" enctype="multipart/form-data">
               <div class="form-group ">
                  <label for="">Avatar</label> <br>
                    <img src="<?php if (isset($user['avatar'])){echo $user['avatar'];} ?>" alt="" width="100px" height="100px"><br>
                   <label for="">Chỉnh ảnh</label>
                   <input type="file" class="form-control" id="" placeholder="" name="avatar">
               </div>
     						<div class="form-group">
     								<label for="">Họ tên</label>
     								<input type="hidden" name="id" value="<?= $user['id']?>">
     								<input type="text" class="form-control" id="" value="<?= $user['name'] ?>" name="name">
     						</div>
     						<div class="form-group">
     								<label for="">Số điên thoại</label>
     								<input type="text" class="form-control" id="" value="<?php if (isset($user['mobile'])){echo $user['mobile'];} ?>" name="mobile">
     						</div>
     						<div class="form-group">
     								<label for="">Quê quán</label>
     								<input type="text" class="form-control" id="" value="<?php if (isset($user['address'])){echo $user['address'];} ?>" name="address">
     						</div>
     						<div class="form-group">
     								<label for="">Năm sinh</label>
     								<input type="date" class="form-control" id="" value="<?php if (isset($user['age'])){echo $user['age'];} ?>" name="age">
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
