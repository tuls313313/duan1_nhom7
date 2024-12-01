<?php include './views/user/layout/header.php'; ?>

<!-- Nhúng Bootstrap 5 từ CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEJp3QhqLMpG8r+KnujsAWDmyJzH4YLOa0PfQnxUP8l2V7f0d85fuZyXhftIW" crossorigin="anonymous">
<style>
    
</style>
<div class="content my-5">
    <div class="container">
        <form action="?act=user/order" method="POST" class="row g-4">
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
                    <!-- <?php var_dump($_SESSION['buyNow1']) ?> -->
                    <div class="row mb-3 align-items-center">
                        <div class="col-4">
                            <img src="./uploads/upimg/<?= $_SESSION['buyNow1']['img'] ?>" alt="Product Image"
                                class="img-fluid rounded">
                        </div>
                        <div class="col-6">
                            <h5 class="fw-semibold"><strong>Tên sản phẩm:</strong > <?= $_SESSION['buyNow1']['name'] ?></h5>
                            <p><strong>Size:</strong>
                            <?php if($data_size['id'] == $_SESSION['buyNow']['id_size']) echo $data_size['name'] ?>
                            </p>
                            <p><strong>Màu sắc:</strong> 
                            <?php if($data_color['id'] == $_SESSION['buyNow']['id_color']) echo $data_color['name'] ?>
                            </p>
                            <p><strong>Số lượng:</strong> <?= $_SESSION['buyNow']['quantity'] ?></p>
                        </div>
                       
                            <span class="fw-bold"><?= $_SESSION['buyNow']['quantity'] ?></span>
                        
                    </div>

                    <!-- Phần nhập mã giảm giá -->
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

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h5 class="mb-0">Tổng cộng:</h5>
                        <h5 class="text-primary mb-0" id="total_price">
                            <?= number_format($_SESSION['buyNow']['total_money'], 0, ',', '.') ?>₫
                        </h5>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<?php include './views/user/layout/footer.php'; ?>