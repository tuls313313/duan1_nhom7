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
    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
        <h3>
            <ul class="text-danger">
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </h3>
        <?php unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị 
            ?>
    <?php endif; ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <a class="btn btn-success mb-2" href="?act=admin/comment/add">Add Bình luận</a>
                                <thead>
                                    <tr>
                                        <th>id_cmt</th>
                                        <th>id_user</th>
                                        <th>id_pro</th>
                                        <th>conten</th>
                                        <th>status</th>
                                        <th>time_comment</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listCmt as $cmt) { ?>
                                        <tr>
                                            <td><?= $cmt['id_cmt'] ?></td>
                                            <td><?= $cmt['id_user'] ?></td>
                                            <td><?= $cmt['id_pro'] ?></td>
                                            <td><?= $cmt['conten'] ?></td>
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

