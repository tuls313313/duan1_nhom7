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
  
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/comment/nexteditcmt&id_cmt=<?= $dataOneCmt['id_cmt'] ?>" method="POST">
                        <div class="form-group">
                            <label for="id_user">Usname</label>
                            <input class="form-control" type="hidden" name="id_user" value="<?= $dataOneCmt['id_user'] ?>" readonly>
                            <input class="form-control" type="text"  value="<?= $dataOneCmt['user_a'] ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="id_pro">Sản phẩm</label>
                            <input class="form-control" type="hidden" name="id_pro" value="<?= $dataOneCmt['id_pro'] ?>" readonly>
                            <input class="form-control" type="text" value="<?= $dataOneCmt['name_p'] ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="conten">Nội dung</label>
                            <input class="form-control" type="text" name="conten" value="<?= $dataOneCmt['conten'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="time_comment">Thời gian comment</label>
                            <input class="form-control" type="text" name="" value="<?= $dataOneCmt['time_comment'] ?>" readonly>
                        </div>
                        <div class="form-group">
                                <label for="status">Trạng thái</label>
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

