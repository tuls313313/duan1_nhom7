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
                    <h1>Trang sửa bình luận</h1>
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
                    <form action="?act=admin/comment/nexteditcmt&id_cmt=<?= $dataOneCmt['id_cmt'] ?>" method="POST">
                        <div class="form-group">
                            <label for="id_user">id_user </label>
                            <input class="form-control" type="text" name="id_user" value="<?= $dataOneCmt['id_user'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_pro">id_pro</label>
                            <input class="form-control" type="text" name="id_pro" value="<?= $dataOneCmt['id_pro'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="conten">conten</label>
                            <input class="form-control" type="text" name="conten" value="<?= $dataOneCmt['conten'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="time_comment">time_comment</label>
                            <input class="form-control" type="text" name="" value="<?= $dataOneCmt['time_comment'] ?>" readonly>
                        </div>
                        <div class="form-group">
                                <label for="status">status</label>
                                <select class="form-control" name="status">
                                    <option value="0" name="status" <?php echo $dataOneCmt['status'] == 0 ? 'selected' : ''; ?>>
                                        Chờ duyệt</option>
                                    <option value="1" name="status" <?php echo $dataOneCmt['status'] == 1 ? 'selected' : ''; ?>>
                                        Đã duyệt</option>
                                </select>
                            </div>
                        <button type="submit" name="submit" class="btn btn-success">Sửa bình luận</button>
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

