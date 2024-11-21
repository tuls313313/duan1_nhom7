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
                    <h1>Trang Thống Kê Sản Phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <class class="col-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Danh Sách Sản Phẩm Thống Kê </h3>

                            </div>
                            <!-- card header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Mã Danh Mục</th>
                                            <th>Tên Danh Mục</th>
                                            <th>Số Lượng</th>
                                            <th>Giá Cao Nhất</th>
                                            <th>Giá Thấp Nhất</th>
                                            <th>Giá Trunh Bình</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listThongKe as $row): ?>
                                            <tr>
                                                <td><?= $row['madm'] ?></td>
                                                <td><?= $row['tendm'] ?></td>
                                                <td><?= $row['countsp'] ?></td>
                                                <td><?= number_format($row['minprice']) ?> VND</td>
                                                <td><?= number_format($row['maxprice']) ?> VND</td>
                                                <td><?= number_format($row['avgprice'], 2) ?> VND</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </class>
            </div>
        </div>
    </section>
</div>




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