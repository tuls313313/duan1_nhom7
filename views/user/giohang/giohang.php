<?php include './views/user/layout/header.php'; ?>
<!-- <div class="container"> -->

<!-- <?php include './views/user/layout/slider.php'; ?> -->
<style>
  form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }

  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }

  form.example button:hover {
    background: #0b7dda;
  }

  form.example::after {
    content: "";
    clear: both;
    display: table;
  }

  /* Mobile & tablet  */
  @media (max-width: 1023px) {}

  /* tablet */
  @media (min-width: 740px) and (max-width: 1023px) {
    .cart-wrap {
      padding-top: 8px;
      padding-bottom: 46px
    }

    .cart-body-left {
      width: 100%;
    }

    .cart-body-right {
      margin-top: 8px;
      width: 100%;
      padding: 16px;
    }
  }

  /* mobile */
  @media (max-width: 739px) {
    .cart-wrap {
      padding-top: 8px;
      padding-bottom: 46px;
    }

    .cart-body-left {
      width: 100%;
    }

    .cart-body-right {
      margin-top: 8px;
      width: 100%;
      padding: 16px;
    }

    .cart-body-row {
      flex-direction: row;
      /* margin-left: -12px;
    margin-right: -12px; */
    }

    .card-info {
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    .card-info-img {
      grid-row: span 3;
    }

    .cart-quantity {
      margin-top: 5px;
    }
  }
</style>
<div class="cart">
  <div class="container">
    <div class="cart-wrap">
      <div class="cart-content">
        <form action="" class="form-cart">
          <div class="cart-body-left">
            <div class="cart-heding hidden-xs">
              <div class="row cart-row">
                <div class="container">
                  <div class="row text-center">
                    <div class="col-3">Sản phẩm</div>
                    <div class="col-1">Đơn giá</div>
                    <div class="col-2">Số lượng</div>
                    <div class="col-1">Màu</div>
                    <div class="col-1">Kích thước</div>
                    <div class="col-1">Thành tiền</div>
                    <div class="col-2">Thao tác</div>
                  </div>
                </div>
                <div class="col-1"></div>
              </div>
            </div>
            <div class="cart-body">
              <div class="row cart-body-row cart-body-row-1" style="align-items: center;">
                <div class="col-md-11 col-10" style="text-align: center;">
                  <div class="row card-info" style="align-items: center;">
                    <?php $tongTienGioHanng = 0;
                    foreach ($listCart as $cart) : ?>
                      <div class="col-md-2 col-12 card-info-img">
                        <a href=""><img class="cart-img" src="./uploads/upimg/<?= $cart['product_image'] ?>" alt=""></a>
                      </div>
                      <div class="col-md-1 col-11">
                        <a href="" class="cart-name">
                          <h5><?php echo $cart['product_name'] ?></h5>
                        </a>
                      </div>
                      <div class="col-md-2 col-12" style="font-size: 16px;">
                        <span><?php echo number_format($cart['product_price'] ?? 0, 0, ',', '.') . ' VNĐ' ?></span>
                      </div>
                      <div class="col-md-2 col-12">
                        <div class="cart-quantity">
                          <!-- <input type="button" value="-" class="control" onclick="tru(1)"> -->
                          <input type="text" value="<?php echo $cart['product_quantity'] ?>" class="text-input" id="text_so_luong-1" name="product_quantity">
                          <!-- <input type="button" value="+" class="control" onclick="cong(1)"> -->
                        </div>
                      </div>
                      <div class="col-md-1 col-11" style="font-size: 16px;">
                        <div class="cart-color">
                          <!-- <input type="button" value="-" class="control" onclick="tru(1)"> -->
                          <span><?php echo $cart['color_name'] ?></span>
                          <!-- <input type="button" value="+" class="control" onclick="cong(1)"> -->
                        </div>
                      </div>
                      <div class="col-md-1 col-11" style="font-size: 16px;">
                        <div class="cart-size">
                          <!-- <input type="button" value="-" class="control" onclick="tru(1)"> -->
                          <span><?php echo $cart['size_name'] ?></span>
                          <!-- <input type="button" value="+" class="control" onclick="cong(1)"> -->
                        </div>
                      </div>
                      <div class="col-md-2 col-12 hidden-xs" style="font-size: 16px;">
                        <span>
                          <?php
                          $tongTien = 0;
                          $tongTien = $cart['product_price'] * $cart['product_quantity'];
                          $tongTienGioHanng += $tongTien;
                          echo number_format($tongTien, 0, ',', '.') . ' VNĐ';
                          ?>
                        </span>
                      </div>
                      <div class="col-md-1 col-2 text-right">
                        <button href="?act=xoagiohang&id=<?= $cart['cart_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger">Xóa</button>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="cart-footer">
              <div class="row cart-footer-row">
                <div class="col-1"></div>
                <div class="col-11 continue">
                  <a href="?act=trangchu">
                    <i class="fas fa-chevron-left"></i>
                    Tiếp tục mua sắm
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="cart-body-right">
            <div class="cart-total">
              <label for="">Thành tiền:</label>
              <span class="total__price">
                <?php
                echo number_format($tongTienGioHanng, 0, ',', '.') . ' VNĐ';
                ?>
              </span>
            </div>
            <div class="cart-buttons">
              <a style="display: block; text-align: center;" href="?act=thanhtoan" class="chekout">THANH TOÁN</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include './views/user/layout/footer.php'; ?>