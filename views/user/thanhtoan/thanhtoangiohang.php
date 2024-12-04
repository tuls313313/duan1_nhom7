<?php include './views/user/layout/header.php'; ?>

<!-- Nhúng Bootstrap 5 từ CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEJp3QhqLMpG8r+KnujsAWDmyJzH4YLOa0PfQnxUP8l2V7f0d85fuZyXhftIW" crossorigin="anonymous">
<style>
    
</style>
<div class="content my-5">
    <div class="container">
        <form action="?act=next_tt_giohang" method="POST" class="row g-4">
            <!-- Thông tin giao hàng -->
            <div class="col-lg-6 col-12">
                <div class="main shadow-lg rounded p-5">
                    <div class="text-center mb-4">
                        <h1 class="text-primary fw-bold">P&T SHOP</h1>
                        <h2 class="text-secondary">Thông tin giao hàng</h2>
                    </div>
                    <div class="mb-3">
                        <label for="diachi" class="form-label fw-semibold">Địa chỉ</label>
                        <input name="diachi" type="text" class="form-control"
                            value="<?= $_SESSION['account']['address'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="hoten" class="form-label fw-semibold">Họ tên</label>
                        <input name="hoten" type="text" class="form-control"
                            value="<?= $_SESSION['account']['user'] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="sdt" class="form-label fw-semibold">Số điện thoại</label>
                        <input name="sdt" type="text" class="form-control" value="<?= $_SESSION['account']['tel'] ?>">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="?act=giohang" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i> Giỏ hàng
                        </a>
                        <button name="submit" class="btn btn-primary">Thanh toán</button>
                    </div>
                </div>
            </div>

            <!-- Thông tin đơn hàng -->
            <div class="col-lg-6 col-12">
                <div class=" shadow-lg rounded p-5" style="background-color: #f3f3f3;">
                    <h2 class="mb-4 text-secondary">Thông tin đơn hàng</h2>
                    <?php 
                    $totalPrice = 0;
                    $totalAmount = 0;
                    if(isset($_SESSION['list_cart'])) foreach ($_SESSION['list_cart'] as $list_cart) {
                    $totalPrice += $list_cart['cart_detail_money'] * $list_cart['cart_detail_quantity'];
                    $totalAmount += $list_cart['cart_detail_quantity'];
                    $cart_detail_id = $list_cart['cart_detail_id'];
                    $cart_detail_ids[] = $cart_detail_id;

                    $cart_id= $list_cart['cart_id'];
                    $cart_id_ids[] = $cart_id;
                    
                    ?> 

                    <div class="row mb-3 align-items-center">
                        <div class="col-4">
                            <img src="./uploads/upimg/<?= $list_cart['product_image'] ?>" alt="Product Image"
                                class="img-fluid rounded">
                        </div>
                        <div class="col-6">
                            <h5 class="fw-semibold"><strong>Tên sản phẩm:</strong > <?= $list_cart['product_name'] ?></h5>
                            <p><strong>Size:</strong>
                            <?= $list_cart['size_name'] ?>
                            </p>
                            <p><strong>Màu sắc:</strong> 
                            <?= $list_cart['color_name'] ?>
                            </p>
                            <p><strong>Số lượng:</strong> 
                            <?= $list_cart['cart_detail_quantity'] ?>
                           </p>
                           <p><strong>đơn giá:</strong> 
                            <?= number_format($list_cart['cart_detail_money'],0,',','.').'Vnđ';  ?>
                           </p>
                        </div>
                    </div>

                    <?php }?>
                    <div class="mb-3">
                        <label for="promotion" class="form-label fw-semibold">Nhập mã giảm giá</label>
                        <div class="input-group">
                            <input type="text" name="promotion" id="promotion" class="form-control"
                                placeholder="Nhập mã tại đây">
                            <button type="button" class="btn btn-outline-primary">Áp dụng</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="payment" class="form-label fw-semibold">Phương thức thanh toán</label>
                        <select name="payment" id="payment" class="form-control">
                            <option value="0">Thanh toán khi nhận hàng</option>
                            <option value="1">Thanh toán online</option>
                        </select>
                    </div>
                    <input type="hidden" name="total_amount" value="<?= $totalAmount ?>">
                    <input type="hidden" name="total_money" value="<?= $totalPrice ?>">
                    <input type="hidden" name="cart_detail_ids[]" value="<?= implode(',', $cart_detail_ids) ?>">
                    <input type="hidden" name="cart_id[]" value="<?= implode(',', $cart_id_ids) ?>">


                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h5 class="mb-0">Tổng cộng:</h5>
                        <h5 class="text-primary mb-0" id="total_price">
                            <?= number_format($totalPrice, 0, ',', '.') ?>₫
                            số lượng : <?= $totalAmount ?>
                        </h5>
                    </div>
                  
                </div>
            </div>

        </form>
    </div>
</div>

<?php include './views/user/layout/footer.php'; ?>