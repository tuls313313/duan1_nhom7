<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang danh sách Variant sản phẩm</h1>
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
                            <a class="btn btn-success mb-2" href="?act=admin/varianti/add">Thêm biến thể</a>
                            <a class="btn btn-info mb-2 ml-3" href="?act=admin/color">List Màu</a>
                            <a class="btn btn-warning mb-2 ml-3" href="?act=admin/size">List Size</a>
                                <h4 class="text-success"> <?php if(isset($_SESSION['success'])) echo $_SESSION['success']; unset($_SESSION['success']); ?></h4>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Size</th>
                                        <th>Màu</th>
                                        <th>số lượng</th>
                                        <th>Hình ảnh</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataVar as $value) { ?>
                                        <tr>
                                            <td><?= $value['variation_id'] ?></td>
                                            <td><?= $value['product_name'] ?></td>
                                            <td><?= $value['size_name'] ?></td>
                                            <td><?= $value['color_name'] ?></td>
                                            <td><?= $value['variation_quantity'] ?></td>
                                            <td><img src="./uploads/var/<?= $value['variation_image'] ?>" alt="Image" height="50" width="50"></td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="?act=admin/variant/edit&id=<?= $value['variation_id'] ?>">Edit</a>
                                                <a class="btn btn-danger"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa: <?= $value['product_name'] ?>');"
                                                    href="?act=admin/variant/delete&id=<?= $value['variation_id'] ?>">Delete</a>
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
