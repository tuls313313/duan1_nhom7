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
                    <form action="?act=admin/product/nextedit&id=<?= $dataOneProduct['id'] ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"
                                value="<?php echo $dataOneProduct['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price"
                                value="<?php echo $dataOneProduct['price']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="img">Img</label>
                            <input type="file" class="form-control" name="img">
                            <p> <img src="./uploads/upimg/<?= $dataOneProduct['img'] ?>"
                                    alt="<?= $dataOneProduct['img'] ?>" style="height: 50px; width=50px;"> </p>
                        </div>
                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control"><?= $dataOneProduct['description']; ?>
                        </textarea>
                    </div>

                        <div class="form-group">
                            <label for="id_categories">id_categories</label>
                            <select name="id_categories" class="form-control">
                                <?php
                                foreach ($listCategories as $listCategori) {
                                    if ($listCategori['id'] == $dataOneProduct['id_categories']) { ?>
                                        <option value="<?php echo $listCategori['id']; ?>" selected>
                                            <?php echo $listCategori['name']; ?>
                                        </option>
                                    <?php }
                                }
                                foreach ($listCategories as $listCategori) {
                                    if ($listCategori['id'] != $dataOneProduct['id_categories']) { ?>
                                        <option value="<?php echo $listCategori['id']; ?>">
                                            <?php echo $listCategori['name']; ?>
                                        </option>
                                    <?php }
                                }
                                ?>
                            </select>
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