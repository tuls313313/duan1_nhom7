<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Trang quản lý thống kê v2 </h1>
                    <h3 class="mx-3"><?php echo $_POST['start_date'] . " - " . $_POST['end_date'] ?></h3>
                    </div>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="row">
            <!-- Doanh thu -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="small-box bg-success shadow-lg rounded">
                    <div class="inner">
                        <h3 class="text-white"><?php echo number_format($tktn['total_money'] ?? 0, 0, ',', '.') . ' đ'; ?></h3>
                        <p class="text-white">Doanh thu</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="?act=admin/statistical" class="small-box-footer bg-success text-white rounded-bottom">
                        Quay lại <i class="fas fa-arrow-circle-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Số đơn -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="small-box bg-warning shadow-lg rounded">
                    <div class="inner">
                        <h3><?php echo $tktn['total_amount'] ?? 0; ?></h3>
                        <p>Số đơn</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="?act=admin/statistical" class="small-box-footer bg-warning text-white rounded-bottom">
                        Quay lại <i class="fas fa-arrow-circle-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Đang chờ -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="small-box bg-info shadow-lg rounded">
                    <div class="inner">
                        <h3><?php echo $tktn['dangcho'] ?? 0; ?></h3>
                        <p>Đang chờ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                    <a href="?act=admin/statistical" class="small-box-footer bg-info text-white rounded-bottom">
                        Quay lại <i class="fas fa-arrow-circle-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Đang giao -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="small-box bg-primary shadow-lg rounded">
                    <div class="inner">
                        <h3><?php echo $tktn['danggiao'] ?? 0; ?></h3>
                        <p>Đang giao</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-shuffle"></i>
                    </div>
                    <a href="?act=admin/statistical" class="small-box-footer bg-primary text-white rounded-bottom">
                        Quay lại <i class="fas fa-arrow-circle-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Hoàn thành -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="small-box bg-success shadow-lg rounded">
                    <div class="inner">
                        <h3><?php echo $tktn['hoanthanh'] ?? 0; ?></h3>
                        <p>Hoàn thành</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-circled"></i>
                    </div>
                    <a href="?act=admin/statistical" class="small-box-footer bg-success text-white rounded-bottom">
                        Quay lại <i class="fas fa-arrow-circle-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once './views/admin/layout/footer.php'; ?>