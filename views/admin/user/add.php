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
                    <h1>Trang Thêm thành viên</h1>
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
                    <form action="?act=admin/user/nextadd" method="POST">
                        <div class="form-group">
                            <label for="user">User</label>
                            <input type="text" class="form-control" name="user"
                                placeholder="vui lòng nhập name trên 6 ký tự">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="vui lòng nhập password trên 6 ký tự">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="vui lòng nhập email">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" class="form-control" name="address" placeholder="vui lòng nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="tel">tel</label>
                            <input type="number" class="form-control" name="tel"
                                placeholder="vui lòng nhập số điện thoại">
                        </div>
                        <!-- Thêm các trường khác ở đây -->
                        <button type="submit" name="addUser" class="btn btn-success">Thêm</button>
                    </form>
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

