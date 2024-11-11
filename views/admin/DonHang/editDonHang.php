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
                            <h3 class="card-title">Form Sửa Đơn Hàng</h3>
                        </div>
                        <section class="content">
                            <form action="<?= '?act=sua-don-hang' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Sửa Thông Tin Đơn Hàng:</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="inputName">Id</label>
                                                    <input type="number" id="inputName" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">User_id</label>
                                                    <input type="number" id="inputName" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Order_date</label>
                                                    <input type="number" id="inputName" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStatus">Status</label>
                                                    <select id="inputStatus" class="form-control custom-select">
                                                        <option disabled>Select one</option>
                                                        <option>On Hold</option>
                                                        <option>Canceled</option>
                                                        <option selected>Success</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Payment</label>
                                                    <input type="number" id="inputName" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputClientCompany">Total_amount</label>
                                                    <input type="number" id="inputClientCompany" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputProjectLeader">Total_money</label>
                                                    <input type="number" id="inputProjectLeader" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputProjectLeader">shipping_address</label>
                                                    <input type="number" id="inputProjectLeader" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputProjectLeader">Create_at</label>
                                                    <input type="number" id="inputProjectLeader" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputProjectLeader">Update_at</label>
                                                    <input type="number" id="inputProjectLeader" class="form-control" >
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </section>
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