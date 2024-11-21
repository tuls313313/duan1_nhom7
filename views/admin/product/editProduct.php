<?php include_once './views/admin/layout/header.php'; ?>

<?php include './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang Chỉnh Sửa Sản Phẩm: <?php echo $dataOneProduct['name'] ?> </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/product/nextedit&id=<?= $dataOneProduct['id'] ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"
                                value="<?php echo $dataOneProduct['name']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price"
                                value="<?php echo $dataOneProduct['price']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="img">Img</label>
                            <input type="text" class="form-control" name="img"
                                value="<?php echo $dataOneProduct['img']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description"
                                value="<?php echo $dataOneProduct['description']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="id_categories">id_categories</label>
                            <input type="text" class="form-control" name="id_categories"
                                value="<?php echo $dataOneProduct['id_categories']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control custom-select">
                                <option value="0" <?= $dataOneProduct['status'] == 0 ? 'selected' : '' ?>>Hoạt Động
                                </option>
                                <option value="1" <?= $dataOneProduct['status'] == 1 ? 'selected' : '' ?>>Không Hoạt Động
                                </option>
                            </select>
                        </div>
                        <button type="submit" name="editProduct" class="btn btn-success mb-2">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>