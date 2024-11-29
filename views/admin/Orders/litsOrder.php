<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>


<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Trang Admin Đơn Hàng</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách đơn hàng</h3>
            </div>
            <div class="card-body">
              <?php if (isset($_SESSION['success']))
                echo "<p class='text-success'> " . $_SESSION['success'] . "</p>";
              unset($_SESSION['success']); ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>user_id</th>
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
                  <?php foreach ($listOrder as $value) { ?>
                    <tr>
                      <td><?= $value['id_order'] ?></td>
                      <td><?= $value['user_name'] ?></td>
                      <td>
                        <?=
                          $value['status_order'] == 1 ? 'Đang chờ' :
                          ($value['status_order'] == 2 ? 'Đang giao' :
                            ($value['status_order'] == 3 ? 'Hoàn Thành' :
                              ($value['status_order'] == 4 ? 'Hủy đơn' : 'Chưa xác định'))); ?>
                      </td>
                      <td><?= $value['payment'] == 0 ? 'Thanh toán khi nhận hàng' : 'Thanh toán online' ?></td>
                      <td><?= $value['total_amount'] ?></td>
                      <td><?= $value['total_money'] ?></td>
                      <td><?= $value['shipping_address'] ?></td>
                      <td><?= $value['create_at'] ?></td>
                      <td><?= $value['update_at'] ?></td>
                      <td>
                        <a href="?act=admin/order/detail&id=<?= $value['id_order'] ?>" class="btn btn-primary">Xem</a>
                        <a href="?act=admin/order/edit&id=<?= $value['id_order'] ?>" class="btn btn-warning">Sửa</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>