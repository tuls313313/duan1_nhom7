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
                    <h1>Trang sửa bình luận </h1>
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
                    <form action="?act=admin/comment/nextadd" method="POST">
                        <div class="form-group">
                            <label for="id_user ">id_user </label>
                            <select name="id_user" class="form-control">
                                <?php foreach ($listAccount as $user) { ?>
                                <option value="<?= $user['id'] ?>"> <?= $user['user'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pro">id_pro</label>
                            <select name="id_pro" class="form-control">
                                <?php foreach ($listProduct as $pro) { ?>
                                <option value="<?= $pro['id'] ?>"> <?= $pro['id'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="conten">conten</label>
                            <textarea name="conten" class="form-control" placeholder="'vui lòng nhập nội dung cmt" minlength="10" maxlength="255"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Thêm Bình luận</button>
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

