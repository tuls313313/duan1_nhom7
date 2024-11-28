<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa Varianti sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/variant/nextedit&id=<?= $dataOne['variation_id'] ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_pro">ID Sản phẩm</label>
                                <select name="id_pro" class="form-control">
                                    <option value="<?= $dataOne['product_id'] ?>"><?= $dataOne['product_name'] ?>
                                    </option>
                                    <?php foreach ($dataProduct as $Product) {
                                        if ($dataOne['product_id'] !== $Product['id']) { ?>
                                            <option value="<?= $Product['id'] ?>"><?= $Product['name'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_color">Màu sắc</label>
                                <select name="id_color" class="form-control">
                                    <option value="<?= $dataOne['size_id'] ?>"><?= $dataOne['size_name'] ?></option>
                                    <?php foreach ($dataSize as $size) {
                                        if ($dataOne['size_id'] !== $size['id']) { ?>
                                            <option value="<?= $size['id'] ?>"><?= $size['name'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_size">Kích thước</label>
                                <select name="id_size" class="form-control">
                                    <option value="<?= $dataOne['color_id'] ?>"><?= $dataOne['color_name'] ?></option>
                                    <?php foreach ($dataColor as $color) {
                                        if ($dataOne['color_id'] !==$color['id']) { ?>
                                            <option value="<?=$color['id'] ?>"><?=$color['name'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="img">Hình ảnh</label>
                                <input type="file" class="form-control" name="img">
                                <p><img src="./uploads/var/<?= $dataOne['variation_image'] ?>" alt="Image" height="50" width="50"></p>
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['err_i']))
                                        echo $_SESSION['err_i'];
                                    unset($_SESSION['err_i']); ?>
                                </p>
                                
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="price">Giá</label>
                                <input type="number" class="form-control" name="price"
                                    value="<?= $dataOne['variation_price'] ?>" >
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['err_p']))
                                        echo $_SESSION['err_p'];
                                    unset($_SESSION['err_p']); ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" name="quantity"
                                    value="<?= $dataOne['variation_quantity'] ?>"
                                    placeholder="Vui lòng nhập số lượng varianti">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['err_q']))
                                        echo $_SESSION['err_q'];
                                    unset($_SESSION['err_q']); ?>
                                </p>
                            </div>
                        </div>
                        <button type="submit" name="editVariant" class="btn btn-success mb-5">Cập nhật Variant</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>