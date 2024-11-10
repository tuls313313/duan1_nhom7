<?php include_once './views/admin/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/admin/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once './views/admin/layout/siderbar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Trang chỉnh sửa thành viên: <?php echo $dataOneUser['user']; ?> </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="?act=admin/user/nextedit&id=<?= $dataOneUser['id'] ?>" method="POST">
            <!-- Các trường nhập dữ liệu -->
            <div class="form-group">
              <label for="user">User</label>
              <input type="text" class="form-control" name="user" value="<?php echo $dataOneUser['user']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password"
                value="<?php echo $dataOneUser['password']; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo $dataOneUser['email']; ?>"
                readonly>
            </div>
            <div class="form-group">
              <label for="address">address</label>
              <input type="text" class="form-control" name="address" value="<?php echo $dataOneUser['address']; ?>">
            </div>
            <div class="form-group">
              <label for="tel">tel</label>
              <input type="text" class="form-control" name="tel" value="<?php echo $dataOneUser['tel']; ?>">
            </div>
            <div class="form-group">
              <label for="role">role</label>
              <select class="form-control" name="role">
                <option value="0" <?php echo $dataOneUser['role'] == 0 ? 'selected' : ''; ?>>Thành viên</option>
                <option value="1" <?php echo $dataOneUser['role'] == 1 ? 'selected' : ''; ?>>Admin</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">status</label>
              <select class="form-control" name="status">
              <option value="0" <?php echo $dataOneUser['status'] == 0 ? 'selected' : ''; ?> >active</option>
              <option value="1" <?php echo $dataOneUser['status'] == 1 ? 'selected' : '';?> >locked</option>
              </select>
            </div>

            <button type="submit" name="editUser"
              onclick="return confirm('Bạn chắc chắn muốn sửa cho user: <?php echo $dataOneUser['user']; ?> ');"
              class="btn btn-success">Edit</button>
          </form>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once './views/admin/layout/footer.php'; ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  // Hàm hiển thị thông báo nổi
  function showNotification(message) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.style.display = 'block';

    // Tự động ẩn thông báo sau 3 giây
    setTimeout(() => {
      notification.style.display = 'none';
    }, 3000);
  }

  // Kiểm tra URL để lấy thông báo
  const urlParams = new URLSearchParams(window.location.search);
  const message = urlParams.get('message');
  if (message) {
    showNotification(message);
  }
</script>
</body>

</html>