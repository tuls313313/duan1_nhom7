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
                      <h5>Status:
                        <?php if ($detail['status_order'] == 1) {
                          echo 'Đang chờ';
                        } else if ($detail['status_order'] == 2) {
                          echo 'Đang giao';
                        } else if ($detail['status_order'] == 3) {
                          echo 'Hoàn thành';
                        }else {
                          echo 'Hủy đơn';
                        }
                        ?>
                      </h5>
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
                            <p>Họ và Tên: <?= $detail['account_user'] ?></p>
                            <p>Email: <?= $detail['account_email'] ?></p>
                            <p>Số điện thoại: <?= $detail['account_tel'] ?></p>
                            <p>Địa chỉ: <?= $detail['account_address'] ?></p>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <address>
                            <strong>Thông tin người nhận:</strong><br>
                            <p>Họ và Tên: <?= $detail['account_user'] ?></p>
                            <p>Email: <?= $detail['account_email'] ?></p>
                            <p>Số điện thoại: <?= $detail['account_tel'] ?></p>
                            <p>Địa chỉ: <?= $detail['account_address'] ?></p>
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
                                <th>Mã đơn</th>
                                <th>Tên sản phẩm</th>
                                <th>Màu</th>
                                <th>Size</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($detailOrderItem as $value) : ?>
                                <tr>
                                  <td><?= $value['id_order'] ?></td>
                                  <td><?= $value['product_name'] ?></td>
                                  <td><?= $value['color_name'] ?></td>
                                  <td><?= $value['size_name'] ?></td>
                                  <td><?= $value['order_item_quantity'] ?></td>
                                  <td><?= $value['order_item_price'] ?></td>
                                </tr>
                                <?php endforeach ?>
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

