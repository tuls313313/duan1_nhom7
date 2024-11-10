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
              <h3 class="card-title">Chi Tiết Đơn Hàng</h3>
            </div>
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="callout callout-info">
                      <h5></i> Status: <?= $detail['status'] ?></h5>
                    </div>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-globe"></i> Thông tin đơn hàng
                            <small class="float-right">
                              <p>Ngày đặt:</p><?= date($detail['create_at']) ?>
                            </small>
                          </h4>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <address>
                            <strong>Thông tin người đặt:</strong><br>
                            <p>Họ và Tên: <?= $detail['user'] ?></p>
                            <p>Email: <?= $detail['email'] ?></p>
                            <p>Số điện thoại: <?= $detail['tel'] ?></p>
                            <p>Địa chỉ: <?= $detail['address'] ?></p>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Thông tin người đặt:</strong><br>
                            <p>Họ và Tên: <?= $detail['user'] ?></p>
                            <p>Email: <?= $detail['email'] ?></p>
                            <p>Số điện thoại: <?= $detail['tel'] ?></p> 
                            <p>Địa chỉ: <?= $detail['shipping_address'] ?></p>
                          </address>
                        </div>
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
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
                              </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                  <td><?= $detail['id'] ?></td>
                                  <td><?= $detail['user_id'] ?></td>
                                  <td><?= $detail['order_date'] ?></td>
                                  <td><?= $detail['status'] ?></td>
                                  <td><?= $detail['payment'] ?></td>
                                  <td><?= $detail['total_amount'] ?></td>
                                  <td><?= $detail['total_money'] ?></td>
                                  <td><?= $detail['shipping_address'] ?></td>
                                  <td><?= $detail['create_at'] ?></td>
                                  <td><?= $detail['update_at'] ?></td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-6">
                          <!-- <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>$250.30</td>
                              </tr>
                              <tr>
                                <th>Tax (9.3%)</th>
                                <td>$10.34</td>
                              </tr>
                              <tr>
                                <th>Shipping:</th>
                                <td>$5.80</td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                              </tr>
                            </table>
                          </div> -->
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
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