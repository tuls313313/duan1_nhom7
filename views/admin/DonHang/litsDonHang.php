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
                  <?php foreach ($listDonHang as $value) { ?>
                    <tr>
                      <td><?= $value['id_order'] ?></td>
                      <td><?= $value['user_id'] ?></td>
                      <td><?= $value['order_date'] ?></td>
                      <td><?= $value['status_order'] == 0 ? 'Đang chờ' : ( $value['status_order'] == 1  ? 'Đang giao' : 'Hoàn Thành' ); ?></td>
                      <td><?= $value['payment'] == 0 ? 'Thanh toán khi nhận hàng' : 'Thanh toán online' ?></td>
                      <td><?= $value['total_amount'] ?></td>
                      <td><?= $value['total_money'] ?></td>
                      <td><?= $value['shipping_address'] ?></td>
                      <td><?= $value['create_at'] ?></td>
                      <td><?= $value['update_at'] ?></td>
                      <td>
                        <a href="?act=admin/donHang/detail&id=<?= $value['id_order'] ?>" class="btn btn-primary">Xem</a>
                        <a href="?act=admin/donHang/edit&id=<?= $value['id_order'] ?>" class="btn btn-warning">Sửa</a>
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

