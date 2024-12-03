<?php include './views/user/layout/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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

  .quantity-btn {
    font-size: 20px;
    cursor: pointer;
    padding: 5px;
  }

  .quantity-input {
    text-align: center;
    width: 50px;
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
        <div class="col-1 fs-4">Hành động</div>
      </div>
    </div>
    <h1 class="text-danger mt-2 mb-2"><?php if(isset($_SESSION['err'])) echo $_SESSION['err']; unset($_SESSION['err']); ?></h1>
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
            <div class="d-flex justify-content-center align-items-center">
            <form action="?act=xoagiohang&id=<?= $cart['cart_detail_id'] ?>" method="post">

            <button class="quantity bg-blue mr-2"name="tru"><i class="bi bi-dash"></i></button>
            <input type="number" name="quantity" value="<?= $cart['product_quantity'] ?>" class="quantity-input" readonly>
            <button class="quantity ml-2" name="cong">cong</button>
            </div>
          <p><?php if(isset( $_SESSION['err_qua'])) echo $_SESSION['err_qua']; unset( $_SESSION['err_qua']);?></p>
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
              <input type="hidden" name="cart_id" value="<?= $cart['cart_id'] ?>">
              <input type="hidden" name="cart_detail_id" value="<?= $cart['cart_detail_id'] ?>">
              <button name="delete" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger">
                Xóa
              </button>
            </form>
          </div>
        </div>
      <?php $_SESSION['listcart'] = $listCart; endforeach; ?>
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