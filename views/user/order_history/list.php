<?php include './views/user/layout/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
.fs-custom {
    font-size: 1.3rem; 
}
.fs-custom1 {
    font-size: 1.5rem; 
}

</style>

<div class="container">
    <div class="card mb-4 mt-2 border-primary">
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="fs-custom1">Lịch Sử Mua Hàng</h5>
        </div>
        <div class="card-body">
            <p><strong class="fs-custom">Tên tài khoản: </strong> <?= $_SESSION['account']['user']; ?></p>
            <p><strong class="fs-custom">Email: </strong>  <?= $_SESSION['account']['email']; ?></p>
            <p><strong class="fs-custom">Số điện thoại: </strong>  <?= $_SESSION['account']['tel']; ?></p>
        </div>
    </div>

    <div class="row">
        <?php foreach ($data_order as $data) {  ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border shadow-sm">
                <div class="card-header bg-light rounded-top">
                    <h5 class="fs-custom1">#<?= $data['id_o'] ?></h5>
                    <small class="fs-custom1">Ngày đặt: <?= $data['create_at'] ?></small>
                </div>
                <div class="card-body">
                    <p><strong class="fs-custom">Tên người nhận: </strong> <?= $data['name_o'] ?></p>
                    <p><strong class="fs-custom">Địa chỉ: </strong> <?= $data['ship_o'] ?></p>
                    <p><strong class="fs-custom">Số điện thoại: </strong> <?= $data['tel_o'] ?></p>
                    <p><strong class="fs-custom">Trạng thái: </strong> 
                        <?php 
                            switch ($data['status']) {
                                case 1:
                                    echo '<span class="btn btn-warning btn-sm text-dark">Đang chờ</span>';
                                    break;
                                case 2:
                                    echo '<span class="btn btn-info btn-sm text-dark">Đang giao</span>';
                                    break;
                                case 3:
                                    echo '<span class="btn btn-success btn-sm">Hoàn thành</span>';
                                    break;
                                case 4:
                                    echo '<span class="btn btn-danger btn-sm">Hủy đơn</span>';
                                    break;
                                default:
                                    echo '<span class="btn btn-secondary btn-sm">Chưa xác định</span>';
                                    break;
                            }
                        ?>
                    </p>
                    <p><strong class="fs-custom">Tổng số lượng: </strong><?= $data['amount'] ?></p>
                    <p><strong class="fs-custom">Tổng tiền: </strong><?= number_format($data['money'] ?? 0, 0, ',', '.') ?> VNĐ</p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<?php include './views/user/layout/footer.php'; ?>