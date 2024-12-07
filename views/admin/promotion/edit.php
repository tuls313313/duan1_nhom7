<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang chỉnh sửa mã khuyến mãi </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/promotion/nextupdate&id=<?php echo $dataPromotion['id'] ?>" method="POST">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Nhập mã khuyến mãi ở đây" 
                            value="<?php echo $dataPromotion['code'] ?>">
                            <p class="text-danger">
                                <?php if (isset($_SESSION['code'])) {
                                    echo $_SESSION['code'];
                                    unset($_SESSION['code']);
                                } ?>
                            </p>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" name="start_date" class="form-control" value="<?php echo $dataPromotion['start_date'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['start_date'])) {
                                        echo $_SESSION['start_date'];
                                        unset($_SESSION['start_date']);
                                    } ?>
                                </p>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" name="end_date" class="form-control" value="<?php echo $dataPromotion['end_date'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['end_date'])) {
                                        echo $_SESSION['end_date'];
                                        unset($_SESSION['end_date']);
                                    } ?>
                                </p>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" class="form-control"
                                    placeholder="Nhập số lượng mã ở đây" value="<?php echo $dataPromotion['quantity'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['quantity'])) {
                                        echo $_SESSION['quantity'];
                                        unset($_SESSION['quantity']);
                                    } ?>
                                </p>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="min_money">Min Money</label>
                                <input type="number" name="min_money" class="form-control"
                                    placeholder="Nhập số tiền áp dụng mã khuyến mãi ở đây" value="<?php echo $dataPromotion['min_money'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['min_money'])) {
                                        echo $_SESSION['min_money'];
                                        unset($_SESSION['min_money']);
                                    } ?>
                                </p>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="discount_value">Discount Value</label>
                                <input type="number" name="discount_value" class="form-control"
                                    placeholder="Nhập số % giảm giá ở đây" value="<?php echo $dataPromotion['discount_value'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['discount_value'])) {
                                        echo $_SESSION['discount_value'];
                                        unset($_SESSION['discount_value']);
                                    } ?>
                                </p>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                <option value="0" <?php echo $dataPromotion['status'] == 0 ? 'selected' : ''; ?>>Hoạt động</option>
                                <option value="1" <?php echo $dataPromotion['status'] == 1 ? 'selected' : ''; ?>>Không hoạt động</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success mb-3">Chỉnh sửa mã giảm giá</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>