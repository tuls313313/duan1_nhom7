<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang danh khuyến mãi</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <a class="btn btn-success mb-2" href="?act=admin/promotion/add">Thêm mã giảm giá</a>
                             <p class="text-success"><?php if(isset( $_SESSION['success'])){
                                echo  $_SESSION['success']; unset($_SESSION['success']);;
                             } ?></p>
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>code</th>
                                        <th>start_date</th>
                                        <th>end_date</th>
                                        <th>quantity</th>
                                        <th>min_money</th>
                                        <th>discount_value</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datapromotion as $promotion) { ?>
                                        <tr>
                                            <td><?= $promotion['id'] ?></td>
                                            <td><?= $promotion['code'] ?></td>
                                            <td><?= $promotion['start_date'] ?></td>
                                            <td><?= $promotion['end_date'] ?></td>
                                            <td><?= $promotion['quantity'] ?></td>
                                            <td><?php echo number_format($promotion['min_money'] ?? 0, 0, ',', '.') . ' VND'; ?></td>
                                            <td><?php echo number_format($promotion['discount_value'] ?? 0, 0, ',', '.') . ' %'; ?></td>
                                            <td><?= $promotion['status'] == 0 ? 'hoạt động' : 'Không hoạt động' ?></td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="?act=admin/promotion/update&id=<?= $promotion['id'] ?>">Edit</a>
                                                <a class="btn btn-danger"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa mã khuyến mãi: <?= $promotion['code'] ?> ?');"
                                                    href="?act=admin/promotion/delete&id=<?= $promotion['id'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>