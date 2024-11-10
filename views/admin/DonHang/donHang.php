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
          <h1>Trang Admin Đơn Hàng</h1>
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
            <div class="card-header">
              <h3 class="card-title">Danh sách đơn hàng</h3>
            </div>
            <!--/.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>user_id</th>
                    <th>order_date</th>
                    <th>status</th>
                    <th>payment</th>
                    <th>total_amount</th>
                    <th>total_money</th>
                    <th>Shipping_address</th>
                    <th>create_at</th>
                    <th>update_at</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dataDonHang as $value) { ?>
                    <tr>
                      <td><?= $value['id'] ?></td>
                      <td><?= $value['user_id'] ?></td>
                      <td><?= $value['order_date'] ?></td>
                      <td><?= $value['status'] ?></td>
                      <td><?= $value['payment'] ?></td>
                      <td><?= $value['total_amount'] ?></td>
                      <td><?= $value['total_money'] ?></td>
                      <td><?= $value['shipping_address'] ?></td>
                      <td><?= $value['create_at'] ?></td>
                      <td><?= $value['update_at'] ?></td>
                      <td>
                        <button class="btn btn-primary">Xem</button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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
</body>

</html>