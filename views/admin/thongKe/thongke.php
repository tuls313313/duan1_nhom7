<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Trang quản lý thống kê</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
        <h5>Thống kê thành viên</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $datatv['tongthanhvien'] ?></h3>
                            <p>Thành viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="?act=admin/user/list" class="small-box-footer">Thêm Thông tin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo number_format($tongdoanhthu['tongdoanhthu'], 0, ',', '.') . ' VND'; ?></h3>
                            <p>Thêm Thông tin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="?act=admin/order" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $datatvactive['tongthanhvienactive'] ?></h3>
                            <p>Thành viên hoạt động</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="?act=admin/user/list" class="small-box-footer">Thêm Thông tin<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $datatvlocked['tongthanhvienlocked'] ?></h3>
                            <p>Thành viên không hoạt động</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="?act=admin/user/list" class="small-box-footer">Thêm Thông tin<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
        <h5>Thống kê đơn hàng</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $datadh['tongsoluong'] ?></h3>
                            <p>đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="?act=admin/order" class="small-box-footer">Thêm Thông tin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h3><?php echo $ttdc['tongDonDangCho'] ?></h3>
                            <p>đơn đang chờ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="?act=admin/order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                        <h3><?php echo $ttdg['tongDonDanggiao'] ?></h3>
                            <p>đơn đang giao</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="?act=admin/order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3><?php echo $ttht['tongDonHoanThanh'] ?></h3>
                            <p>đơn hoàn thành</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="?act=admin/order" class="small-box-footer">Thêm Thông tin<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once './views/admin/layout/footer.php'; ?>