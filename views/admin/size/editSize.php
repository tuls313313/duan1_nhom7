<?php include_once './views/admin/layout/header.php'; ?>

<!-- Navbar -->
<?php include_once './views/admin/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once './views/admin/layout/siderbar.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang chỉnh sửa size: <?php echo $edit_Size['name']; ?> </h1>
                </div>
            </div>
        </div> <!-- /.container-fluid -->
        <div class="text-danger">
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
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/size/nextedit&id=<?php echo $edit_Size['id']; ?>" method="POST">
                        <!-- Các trường nhập dữ liệu -->
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="<?php echo $edit_Size['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="">status</label>
                                <select class="form-control" name="status">
                                    <option value="0" <?php echo $edit_Size['status'] == 0 ? 'selected' : ''; ?>>Hoạt động
                                    </option>
                                    <option value="1" <?php echo $edit_Size['status'] == 1 ? 'selected' : ''; ?>>Không hoạt động
                                    </option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="editSize" class="btn btn-success">Sửa</button>
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

<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->
<?php include_once './views/admin/layout/footer.php'; ?>