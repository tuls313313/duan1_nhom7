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
                    <h1>Trang Admin Đơn Hàng</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">Danh sách danh mục</h3>
                        </div>
                        <!--/.card-header -->
                        <div class="card-body">
                            <a class="btn btn-success mb-2" href="?act=admin/categories/addCategories">Add Danh Mục</a>
                            <h4 class="text-danger mt-2 mb-2" id="notification" class="notification"></h4>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status_categories</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listCategories as $value) { ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['status_categories'] == 0 ? 'Hoạt Động' : 'Không Hoạt Động' ?></td>
                                            <td>
                                                <a href="?act=admin/categories/edit&id=<?= $value['id'] ?>" class="btn btn-warning">Sửa</a>
                                                <a href="?act=admin/categories/delete&id=<?= $value['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không: <?= $value['name'] ?>')">Xóa</a>
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

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>