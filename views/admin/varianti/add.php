<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang Thêm Varianti sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/varianti/nextadd" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_pro">ID Sản phẩm</label>
                                <select name="id_pro" class="form-control">
                                    <?php foreach ($dataProduct as $Product) { 
                                        if($Product['status'] != 1){?>
                                        <option value="<?= $Product['id'] ?>"><?= $Product['name'] ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_color">Màu sắc</label>
                                <select name="id_color" class="form-control">
                                    <?php foreach ($dataColor as $Color) { 
                                        if($Color['status'] != 1){
                                            ?>
                                        <option value="<?= $Color['id'] ?>"><?= $Color['name'] ?></option>
                                    <?php }
                                } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_size">Size</label>
                                <select name="id_size" class="form-control">
                                    <?php foreach ($dataSize as $size) { 
                                        if($size['status'] !=1){?>
                                        <option value="<?= $size['id'] ?>"><?= $size['name'] ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="img">Hình ảnh</label>
                                <input type="file" class="form-control" name="img">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['err_i']))
                                        echo $_SESSION['err_i'];
                                    unset($_SESSION['err_i']); ?>
                                </p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" name="quantity" placeholder="Vui lòng nhập số lượng varianti">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['err_q']))
                                        echo $_SESSION['err_q'];
                                    unset($_SESSION['err_q']); ?>
                                </p>
                            </div>
                        </div>

                        <button type="submit" name="addVariant" class="btn btn-success mb-5">Thêm Variant</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>