<?php include './views/user/layout/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .cart-container {
    background-color: #ffffff;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top: 20px;
  }

  .cart-heading {
    background-color: #f8f9fa;
    padding: 10px;
    font-weight: bold;
    text-align: center;
    border-bottom: 2px solid #007bff;
  }

  .cart-item {
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
  }

  .cart-item:last-child {
    border-bottom: none;
  }

  .cart-img {
    max-width: 60px;
    height: auto;
    border-radius: 5px;
  }

  .cart-total {
    text-align: right;
    font-weight: bold;
    font-size: 18px;
    margin-top: 15px;
  }

  .cart-buttons {
    text-align: right;
    margin-top: 20px;
  }

  .btn-primary,
  .btn-success {
    margin-left: 10px;
  }

  .text-small {
    font-size: 14px;
  }
</style>

<div class="container">
  <div class="cart-container">
    <div class="cart-heading">
      <div class="row">
        <div class="col-2 fs-4">Sản phẩm</div>
        <div class="col-2 fs-4">Đơn giá</div>
        <div class="col-2 fs-4">Số lượng</div>
        <div class="col-2 fs-4">Màu</div>
        <div class="col-1 fs-4">Kích thước</div>
        <div class="col-2 fs-4">Thành tiền</div>
        <div class="col-1 fs-4">acttion</div>
      </div>
    </div>

    <div class="cart-body">
      <?php
      $tongTienGioHanng = 0;
      foreach ($listCart as $cart): ?>
        <div class="row cart-item align-items-center text-center">
          <div class="col-2">
            <img src="./uploads/upimg/<?= $cart['product_image'] ?>" class="cart-img" alt="">
            <div class="text-small"><?= $cart['product_name'] ?></div>
          </div>
          <div class="col-2 fs-5"><?= number_format($cart['product_price'], 0, ',', '.') . ' VNĐ' ?></div>
          <div class="col-2 fs-5">
            <input type="number" min="1" value="<?= $cart['product_quantity'] ?>" name="product_quantity"
              class="text-center">
          </div>
          <div class="col-2 fs-5"><?= $cart['color_name'] ?></div>
          <div class="col-1 fs-5"><?= $cart['size_name'] ?></div>
          <div class="col-2 fs-5">
            <?php
            $tongTien = $cart['product_price'] * $cart['product_quantity'];
            $tongTienGioHanng += $tongTien;
            echo number_format($tongTien, 0, ',', '.') . ' VNĐ';
            ?>

          </div>
          <div class="col-1">
            <form action="?act=xoagiohang" method="post">
              <input type="hidden" name="cart_id" value="<?= $cart['cart_id'] ?>">
              <input type="hidden" name="cart_detail_id" value="<?= $cart['cart_detail_id'] ?>">
              <button name="delete" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')"
                class="btn btn-danger">
                Xóa
              </button>
            </form>
          </div>

        </div>

      <?php endforeach;?>
    </div>
    <hr>

    <div class="cart-total text-danger">
      Thành tiền: <?= number_format($tongTienGioHanng, 0, ',', '.') . ' VNĐ' ?>
    </div>

    <div class="cart-buttons">
      <p class="fs-4 text-success"><?php if(isset($_SESSION['success'])) echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
      <a href="?act=trangchu" class="btn btn-secondary fs-5">Tiếp tục mua sắm</a>
      <a href="?act=thanhtoangiohang" class="btn btn-success fs-5">Thanh toán</a>
    </div>
  </div>
</div>

<?php include './views/user/layout/footer.php'; ?>