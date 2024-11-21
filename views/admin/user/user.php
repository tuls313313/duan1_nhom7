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
          <h1>Trang Admin danh sách thành viên</h1>
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
                      <th>email</th>
                      <th>address</th>
                      <th>tel</th>
                      <th>ip_address</th>
                      <th>role</th>
                      <th>status</th>
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
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['address'] ?></td>
                        <td><?= $value['tel'] ?></td>
                        <td><?= $value['ip_address'] ?></td>
                        <td><?= $value['role'] == 1 ? 'Admin' : 'Thành viên' ?></td>
                        <td><?= $value['create_at'] ?></td>
                        <td><?= $value['update_at'] ?></td>
                        <td>
                          <a class="btn btn-primary" href="?act=admin/user/edit&id=<?= $value['id'] ?>">Edit</a>
                          <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa thành viên: <?= $value['user'] ?> ?');" href="?act=admin/user/delete&id=<?= $value['id'] ?>">Delete</a>
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
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>