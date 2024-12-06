<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>


<?php include_once './views/admin/layout/siderbar.php'; ?>


<div class="content-wrapper">
    <section class="mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <?php var_dump($edit); ?> -->
                    <form action="?act=admin/order/editOrder&id_order=<?= $edit['id_order'] ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Sửa Thông Tin Đơn Hàng:
                                            <?= $edit['user'] ?> 
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="id">Id</label>
                                                <input type="number" name="id_order" class="form-control"
                                                    value="<?= $edit['id_order'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="user_id">Usname</label>
                                                <input type="number" name="user_id" class="form-control"
                                                    value="<?= $edit['user_id'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="status_order">Trạng thái đơn hàng</label>
                                                <select name="status_order" class="form-control">
                                                    <option value="1" <?= $edit['status_order'] == 1 ? 'selected' : '' ?>>
                                                        Đang chờ</option>
                                                    <option value="2" <?= $edit['status_order'] == 2 ? 'selected' : '' ?>>
                                                        Đang giao</option>
                                                    <option value="3" <?= $edit['status_order'] == 3 ? 'selected' : '' ?>>
                                                        Hoàn thành</option>
                                                    <option value="4" <?= $edit['status_order'] == 4 ? 'selected' : '' ?>>
                                                        Hủy đơn</option>
                                                </select>
                                                <?php if (isset($_SESSION['status']))
                                                    echo "<p class='text-danger'> " . $_SESSION['status'] . "</p>";
                                                unset($_SESSION['status']); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="payment">Phương thức thanh toán</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $edit['payment'] == 0 ? 'Thanh toán khi nhận hàng' : 'Thanh toán online' ?>"
                                                    readonly>
                                                <input type="hidden" name="payment"
                                                    value="<?= $edit['payment'] == 0 ? 0 : 1 ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="total_amount">Tổng số lượng</label>
                                                <input type="number" name="total_amount" class="form-control"
                                                    value="<?= $edit['total_amount'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="total_money">Tổng tiền</label>
                                                <input type="hidden" name="total_money" class="form-control"
                                                    value="<?= $edit['total_money'] ?>" readonly>
                                                <p class="form-control" readonly> <?= number_format($edit['total_money'] ?? 0, 0, ',', '.') . ' Vnđ' ?></p>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="shipping_address">Địa chỉ</label>
                                                <input type="text" name="shipping_address" class="form-control"
                                                    value="<?= $edit['shipping_address'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="transaction_status">Trạng thái thanh toán</label>
                                                <input type="text" name="" class="form-control"
                                                    value=" <?= $edit['transaction_status'] == 0 ? 'chưa thanh toán' : 'Đã thanh toán' ?>" readonly>
                                                <input type="hidden" name="transaction_status" class="form-control"
                                                    value=" <?= $edit['transaction_status'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="create_at">Ngày tạo đơn</label>
                                                <input type="text" name="create_at" class="form-control"
                                                    value="<?= $edit['create_at'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="update_at">Ngày cập nhật</label>
                                                <input type="text" name="update_at" class="form-control"
                                                    value="<?= $edit['update_at'] ?>" readonly>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_tran" value="<?= $edit['id_tran'] ?>">
                                        <button type="submit" class="btn btn-success" name="editOrder">
                                            Submit
                                        </button>
                                        <a class="btn btn-primary" href="?act=admin/order">Quay lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>