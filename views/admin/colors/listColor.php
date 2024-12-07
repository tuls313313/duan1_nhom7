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
                    <h1>Trang danh sách màu</h1>
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
                        <div class="card-header">
                            <a class="btn btn-success mb-2" href="?act=admin/color/addColor">Add Màu</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listColor as $value) { ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['status'] == 0 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                            <td>
                                                <a class="btn btn-warning"
                                                    href="?act=admin/color/edit&id=<?= $value['id'] ?>">Sửa</a>
                                                <a class="btn btn-danger"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa màu: <?= $value['name'] ?> ?');"
                                                    href="?act=admin/color/delete&id=<?= $value['id'] ?>">Xóa</a>
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