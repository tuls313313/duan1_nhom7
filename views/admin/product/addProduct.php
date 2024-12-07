<?php include_once './views/admin/layout/header.php'; ?>

<?php include './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang thêm Sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content mb-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <form action="?act=admin/product/insert" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name">
                    <p class="text-danger"><?php if(isset($_SESSION['err_n'])) echo $_SESSION['err_n']; unset($_SESSION['err_n']); ?></p>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" class="form-control" name="price">
                    <p class="text-danger"><?php if(isset($_SESSION['err_p'])) echo $_SESSION['err_p']; unset($_SESSION['err_p']); ?></p>

                </div>
                <div class="form-group">
                    <label for="img">Hình ảnh</label>
                    <input type="file" class="form-control" name="img">
                    <p class="text-danger"><?php if(isset($_SESSION['err_i'])) echo $_SESSION['err_i']; unset($_SESSION['err_i']); ?></p>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" placeholder="vui lòng nhập nội dung sản phẩm" minlength="10" maxlength="255"></textarea>

                </div>
                <div class="form-group">
                    <label for="id_categories">Danh mục</label>
                    <select name="id_categories" class="form-control">
                        <?php foreach ($listCategories as $listCategori) { ?>

                            <option value="<?php echo $listCategori['id'] ?>"><?php echo $listCategori['name'] ?></option>
                            <?php var_dump($listCategories);
                        } ?>
                    </select>
                </div>
                <button type="submit" name="addProduct" class="btn btn-success">Thêm Sản phẩm</button>
            </form>
                </div>

            </div>
        </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>