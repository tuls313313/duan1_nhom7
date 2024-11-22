<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Trang quản lý thống kê v2</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Doanh thu -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo number_format($tktn['total_money'] ?? 0, 0, ',', '.') . ' đ'; ?></h3>
                        <p>Doanh thu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="?act=admin/statistical" class="small-box-footer">
                        Quay lại <i class="fas fa-arrow-circle-right ms-5"></i>
                    </a>
                </div>
            </div>
            
            <!-- Đơn đang chờ -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $tktn['count_status_order'] ?? 0; ?></h3>
                        <p>Đơn đang chờ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="?act=admin/statistical" class="small-box-footer">
                        Quay lại <i class="fas fa-arrow-circle-right ms-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once './views/admin/layout/footer.php'; ?>