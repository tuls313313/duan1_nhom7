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
                            <form action="?act=admin/donHang/editDonHang&id=<?= $edit['id_order'] ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Sửa Thông Tin Đơn Hàng:
                                                    <?php
                                                    foreach ($dataUser as $user) {
                                                        if ($edit['user_id'] == $user['id']) {
                                                            echo $user['user'];
                                                        }
                                                    }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="id">Id</label>
                                                    <input type="number" name="id_order" class="form-control"
                                                        value="<?= $edit['id_order'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="user_id">User_id</label>
                                                    <input type="number" name="user_id" class="form-control"
                                                        value="<?= $edit['user_id'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="order_date">Order_date</label>
                                                    <input type="text" name="order_date" class="form-control"
                                                        value="<?= $edit['order_date'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status_order">status_order</label>
                                                    <select name="status_order" class="form-control">
                                                        <option value="0" <?= $edit['status_order'] == 0 ? 'selected' : '' ?>>
                                                            Đang chờ</option>
                                                        <option value="1" <?= $edit['status_order'] == 1 ? 'selected' : '' ?>>Đang
                                                            giao</option>
                                                        <option value="2" <?= $edit['status_order'] == 2 ? 'selected' : '' ?>>
                                                            Hoàn thành</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payment">Payment</label>
                                                    <select name="payment" class="form-control">
                                                        <option value="0" <?= $edit['payment'] == 0 ? 'selected' : '' ?>>
                                                            Thanh toán khi nhận hàng</option>
                                                        <option value="1" <?= $edit['payment'] == 1 ? 'selected' : '' ?>>
                                                            Thanh toán online</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_amount">Total_amount</label>
                                                    <input type="number" name="total_amount" class="form-control"
                                                        value="<?= $edit['total_amount'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_money">Total_money</label>
                                                    <input type="number" name="total_money" class="form-control"
                                                        value="<?= $edit['total_money'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="shipping_address">Shipping_address</label>
                                                    <input type="text" name="shipping_address" class="form-control"
                                                        value="<?= $edit['shipping_address'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="create_at">Create_at</label>
                                                    <input type="text" name="create_at" class="form-control"
                                                        value="<?= $edit['create_at'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="update_at">Update_at</label>
                                                    <input type="text" name="update_at" class="form-control"
                                                        value="<?= $edit['update_at'] ?>" readonly>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="editDonHang">Submit</button>
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
    $(function () {
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