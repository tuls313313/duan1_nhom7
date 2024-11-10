<?php include_once './views/admin/layout/header.php'; ?>

<!-- Navbar -->
<?php include_once './views/admin/layout/navbar.php'; ?>

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
          <h1>Trang Admin User</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách thành viên</h3>
              </div>
              <!--/.card-header -->
              <div class="card-body">
                <a class="btn btn-success mb-2" href="?act=admin/user/add" data-toggle="modal" data-target="#addModal">Add Thành viên</a>
                <h4 class="text-danger mt-2 mb-2" id="notification" class="notification"></h4>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>user</th>
                      <th>password</th>
                      <th>email</th>
                      <th>address</th>
                      <th>tel</th>
                      <th>role</th>
                      <th>create_at</th>
                      <th>update_at</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dataUser as $value) { ?>
                      <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['user'] ?></td>
                        <td><?= $value['password'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['address'] ?></td>
                        <td><?= $value['tel'] ?></td>
                        <td><?= $value['role'] == 1 ? 'Admin' : 'Thành viên' ?></td>
                        <td><?= $value['create_at'] ?></td>
                        <td><?= $value['update_at'] ?></td>
                        <td>
                          <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editModal"
                            data-id="<?= $value['id'] ?>">Edit</a>
                          <a class="btn btn-danger" href="#">Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

              <!-- /.card-body -->
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Thêm Thành viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Form thêm thành viên -->
                    <form action="?act=admin/user/add" method="POST">
                      <!-- Các trường nhập dữ liệu -->
                      <div class="form-group">
                        <label for="user">User</label>
                        <input type="text" class="form-control" name="user">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                      <div class="form-group">
                        <label for="address">address</label>
                        <input type="text" class="form-control" name="address">
                      </div>
                      <div class="form-group">
                        <label for="tel">tel</label>
                        <input type="number" class="form-control" name="tel">
                      </div>
                      <!-- Thêm các trường khác ở đây -->
                      <button type="submit" name="addUser" class="btn btn-success">Thêm</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                      
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa Thành viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Form chỉnh sửa thành viên -->
                    <form action="edit_user.php" method="POST">
                      <input type="hidden" id="edit-id" name="id">
                      <div class="form-group">
                        <label for="edit-user">User</label>
                        <input type="text" class="form-control" id="edit-user" name="user">
                      </div>
                      <div class="form-group">
                        <label for="edit-password">Password</label>
                        <input type="password" class="form-control" id="edit-password" name="password">
                      </div>
                      <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email">
                      </div>
                      <!-- Thêm các trường khác ở đây -->
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- /.card-body -->
          </div>
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