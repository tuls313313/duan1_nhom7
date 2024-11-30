<?php include './views/user/layout/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
  .table {
    font-size: 1.5rem; /* Tăng kích thước chữ, bạn có thể chỉnh theo ý muốn */
  }
</style>

<div class="container mt-4">
  <h2 class="mb-4">Xem chi tiết đơn hàng #<?= $data_oi['id_oi'] ?></h2>

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
      <tr>
        <td><?= $data_oi['id_oi'] ?></td>
        <td><?= $data_oi['name_p'] ?></td>
        <td>
        <?php foreach ( $color as $data) {
            if( $data_oi['color_oi'] == $data['id']){
                echo $data['name'];
            }}?>
        </td>
        <td>
            <?php foreach ($size  as $data) {
            if($data_oi['size_oi'] == $data['id']){
                echo $data['name'];
            }}?>
        </td>
        <td><?= $data_oi['quantity_oi'] ?></td>
        <td><?= number_format($data_oi['price_oi'] ?? 0,0, ',', '.') ?> vn₫</td>
      </tr>
    </tbody>
  </table>
</div>


<?php include './views/user/layout/footer.php'; ?>
