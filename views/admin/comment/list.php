<?php include_once './views/admin/layout/header.php'; ?>

<!-- Navbar -->
<?php include_once './views/admin/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once './views/admin/layout/siderbar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang quản lý bình luận</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <h4 class="text-success"> <?php if(isset($_SESSION['success'])) echo $_SESSION['success']; unset($_SESSION['success']); ?></h4>

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Đánh giá</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian cmt</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listCmt as $cmt) { ?>
                                        <tr>
                                            <td><?= $cmt['id_cmt'] ?></td>
                                            <td><?= $cmt['user_name'] ?></td>
                                            <td><?= $cmt['product_name'] ?></td>
                                            <td><?= $cmt['conten'] ?></td>
                                            <td><?= $cmt['rating'] ?></td>
                                            <td><?= $cmt['status'] == 0 ? 'chờ duyệt' : 'đã duyệt' ?></td>
                                            <td><?= $cmt['time_comment'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary"
                                                    href="?act=admin/comment/edit&id_cmt=<?= $cmt['id_cmt'] ?>">Edit</a>
                                                <a class="btn btn-danger"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa commetn với id: <?= $cmt['id_cmt'] ?> ?');"
                                                    href="?act=admin/comment/delete&id_cmt=<?= $cmt['id_cmt'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once './views/admin/layout/footer.php'; ?>

