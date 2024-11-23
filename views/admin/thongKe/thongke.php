<?php include_once './views/admin/layout/header.php'; ?>
<?php include_once './views/admin/layout/navbar.php'; ?>
<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center text-primary">Trang quản lý thống kê</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <h5 class="mb-4 text-secondary">Thống kê thành viên</h5>
            <div class="row g-4">
                <div class="col-lg-3 col-6">
                    <div class="card bg-info text-white shadow-sm">
                        <div class="card-body">
                            <h3><?php echo $datatv['tongthanhvien']; ?></h3>
                            <p>Thành viên</p>
                        </div>
                        <a href="?act=admin/user/list" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-warning text-white shadow-sm">
                        <div class="card-body">
                        <h3>
                         <?php echo number_format($tongdoanhthu['tongdoanhthu'] ?? 0, 0, ',', '.') . ' VND'; ?>
                        </h3>
                            <p>Doanh thu</p>
                        </div>
                        <a href="?act=admin/order" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-success text-white shadow-sm">
                        <div class="card-body">
                            <h3><?php echo $datatvactive['tongthanhvienactive']; ?></h3>
                            <p>Thành viên hoạt động</p>
                        </div>
                        <a href="?act=admin/user/list" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-danger text-white shadow-sm">
                        <div class="card-body">
                            <h3><?php echo $datatvlocked['tongthanhvienlocked']; ?></h3>
                            <p>Thành viên không hoạt động</p>
                        </div>
                        <a href="?act=admin/user/list" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container-fluid">
            <h5 class="mb-4 text-secondary">Thống kê đơn hàng</h5>
            <div class="row g-4">
                <div class="col-lg-3 col-6">
                    <div class="card bg-info text-white shadow-sm">
                        <div class="card-body">
                            <h3><?php echo $datadh['tongsoluong']; ?></h3>
                            <p>Đơn hàng</p>
                        </div>
                        <a href="?act=admin/order" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-warning text-white shadow-sm">
                        <div class="card-body">
                            <h3><?php echo $ttdc['tongDonDangCho']; ?></h3>
                            <p>Đơn đang chờ</p>
                        </div>
                        <a href="?act=admin/order" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-primary text-white shadow-sm">
                        <div class="card-body">
                            <h3><?php echo $ttdg['tongDonDanggiao']; ?></h3>
                            <p>Đơn đang giao</p>
                        </div>
                        <a href="?act=admin/order" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-success text-white shadow-sm">
                        <div class="card-body">
                            <h3><?php echo $ttht['tongDonHoanThanh']; ?></h3>
                            <p>Đơn hoàn thành</p>
                        </div>
                        <a href="?act=admin/order" class="card-footer text-white">
                            Thêm Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4 ">
        <div class="container-fluid">
            <h5 class="mb-4 text-secondary">Thống kê đơn hàng theo ngày</h5>
            <form action="?act=admin/statisticalV2" method="POST" class="row g-3 p-4 rounded shadow-sm bg-light">
                <!-- Ngày bắt đầu -->
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" required>
                </div>
                <!-- Ngày kết thúc -->
                <div class="col-md-4">
                    <label for="end_date" class="form-label">Ngày kết thúc</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" required>
                </div>
                <!-- Trạng thái đơn hàng -->
                <div class="col-md-4">
                    <label for="status_order" class="form-label">Trạng thái đơn hàng</label>
                    <select name="status_order" id="status_order" class="form-select form-control">
                        <option value="" selected>Tất cả</option>
                        <option value="0">Đang chờ</option>
                        <option value="1">Đang giao</option>
                        <option value="2">Hoàn thành</option>
                    </select>
                </div>
                <!-- Nút xem thống kê -->
                <div class="col-12 text-end mt-3 text-center ">
                    <button type="submit" class="btn btn-primary p-3">Xem thống kê</button>
                </div>
            </form>
        </div>
    </section>

</div>

<?php include_once './views/admin/layout/footer.php'; ?>