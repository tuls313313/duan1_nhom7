<?php include './views/user/layout/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
  .container {
    font-size: 1.5rem; /* Tăng kích thước chữ, bạn có thể chỉnh theo ý muốn */
  }
  .fs{
    font-size: 1.8rem;
  }
</style>

<div class="container mt-4">
  <h2 class=" mb-4">Xem chi tiết đơn hàng #<?= $data_oi['id_oi']  ?? null?></h2>
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
        <td><?= $data_oi['id_oi'] ?? null?></td>
        <td><?= $data_oi['name_p'] ?? null ?></td>
        <td>
        <?php foreach ( $color as $data) {
            if( $data_oi['color_oi']  == $data['id']){
                echo $data['name'] ?? null ;
            }}?>
        </td>
        <td>
            <?php foreach ($size  as $data) {
            if($data_oi['size_oi']== $data['id'] ){
                echo $data['name'] ?? null;
            }}?>
        </td>
        <td><?= $data_oi['quantity_oi'] ?? null ?></td>
        <td><?= number_format($data_oi['price_oi'] ?? 0,0, ',', '.') ?> vn₫</td>
      </tr>
    </tbody>
  </table>
  <a class="btn btn-primary mb-2 fs" href="?act=user/order_history">Quay lại lịch sử mua hàng</a>

</div>


<?php include './views/user/layout/footer.php'; ?>
