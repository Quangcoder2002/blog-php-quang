   <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
      </div>
      <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Quang</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" style="display: none; top: 57px; bottom: 57px;">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->




  <!-- jQuery -->
  <script src="publics/Admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="publics/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="publics/Admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="publics/Admin/dist/js/demo.js"></script>
  <!--toast-->
  <script src="publics/toast/js/toast.js"></script>
  <!--CKEditor4-->
  <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
  <script>
   <?php echo $notification; ?>
    CKEDITOR.replace('full')
  </script>
</body>
</html>
