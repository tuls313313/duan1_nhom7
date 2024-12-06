<?php include './views/user/layout/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
  .container {
    font-size: 1.5rem;
    /* Tăng kích thước chữ, bạn có thể chỉnh theo ý muốn */
  }

  .fs {
    font-size: 1.8rem;
  }
</style>

<div class="container mt-4">

  <h2 class=" mb-4">Xem chi tiết đơn hàng</h2>
  <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> Thông tin đơn hàng
          <small class="float-right">
            <p>Ngày đặt:</p><?= date($data_oi_one ['create_at']) ?>
          </small>
        </h4>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Thông tin người đặt:</strong><br>
          <p>Họ và Tên: <?= $data_oi_one ['name_a'] ?></p>
          <p>Số điện thoại: <?= $data_oi_one ['tel_a'] ?></p>
          <p>Địa chỉ: <?= $data_oi_one ['ship_a'] ?></p>
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Thông tin người nhận:</strong><br>
          <p>Họ và Tên: <?= $data_oi_one ['name_o'] ?></p>
          <p>Số điện thoại: <?= $data_oi_one ['tel_o'] ?></p>
          <p>Địa chỉ: <?= $data_oi_one ['ship_o'] ?></p>
        </address>
      </div>
    </div>
  <table class="table table-striped table-bordered fs-5">
    <thead class="table-dark">
      <tr>
        <th>Mã đơn</th>
        <th>Tên sản phẩm</th>
        <th>Màu</th>
        <th>size</th>
        <th>Số lượng</th>
        <th>Giá</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data_oi as $value) { ?>
        <tr>
          <td><?= $value['id_o'] ?></td>
          <td><?= $value['name_p'] ?></td>
          <td>
            <?php
            foreach ($color as $data) {
              if ($value['color_oi'] == $data['id']) {
                echo $data['name'];
              }
            } ?>
          </td>
          <td>
            <?php
            foreach ($size as $data) {
              if ($value['size_oi'] == $data['id']) {
                echo $data['name'];
              }
            } ?>
          </td>
          <td><?= $value['quantity_oi'] ?></td>
          <td><?= number_format($value['price_oi'] ?? 0, 0, ',', '.') ?> vn₫</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  
  <a class="btn btn-primary mb-2 fs" href="?act=user/order_history">Quay lại lịch sử mua hàng</a>

</div>
<?php include './views/user/layout/footer.php'; ?>