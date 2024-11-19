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
                    <h1>Trang Thêm Danh Mục</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/categories/add" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Vui lòng nhập name">
                            <?php
                            if (!empty($_SESSION['error'])) {
                                foreach ($_SESSION['error'] as $error) {
                                    if ($error) {
                                        echo "<li class='text-danger'>{$error}</li>";
                                    }
                                }
                                unset($_SESSION['error']);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="status_categories">Status_categories</label>
                            <select name="status_categories" class="form-control">
                                <option value="1">Hoạt Động</option>
                                <option value="2">Không Hoạt Động</option>
                            </select>
                        </div>
                        <!-- Thêm các trường khác ở đây -->
                        <button type="submit" name="submit" class="btn btn-success">Thêm Mới</button>
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