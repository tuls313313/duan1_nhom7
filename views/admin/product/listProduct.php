<?php include_once './views/admin/layout/header.php'; ?>

<!-- Navbar -->
<?php include_once './views/admin/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang Admin Sản Phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Danh Sách Sản Phẩm </h3>
                            </div>
                            <!-- card header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <a class="btn btn-success mb-2" href="?act=admin/product/add" data-toggle="modal" data-target="#addModal">Thêm sản phẩm</a>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>img</th>
                                            <th>description</th>
                                            <th>id_categories</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listProduct as $value) { ?>
                                            <tr>
                                                <td><?= $value['id'] ?></td>
                                                <td><?= $value['name'] ?></td>
                                                <td><?php echo number_format($value['price'] ?? 0, 0, ',', '.') . ' VND'; ?></td>
                                                <td class="text-center"><img src="./uploads/upimg/<?= $value['img'] ?>" alt="<?= $value['img'] ?>" style="height: 50px; width=50px;"></td>
                                                <td><?= $value['description'] ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($listCategories as $listCategori) {
                                                        if($listCategori['id'] == $value['id_categories']){
                                                            echo $listCategori['name'] ;
                                                        }
                                                       
                                                    }
                                                   
                                                    ?>
                                                </td>
                                                <td><?= $value['status'] == 0 ? 'Hoạt Động' : 'Không Hoạt Động'; ?> </td>
                                                <td>
                                                    <a class="btn btn-primary" href="?act=admin/product/edit&id=<?= $value['id'] ?>">Sửa</a>
                                                    <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa thành viên: <?= $value['name'] ?> ?');" href="?act=admin/product/delete&id=<?= $value['id'] ?>">Xoá</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="addModalLabel">Thêm Sản Phẩm</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form thêm thành viên -->
                                        <form action="?act=admin/product/add" method="POST" enctype="multipart/form-data">
                                            <!-- Các trường nhập dữ liệu -->
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" name="price">
                                            </div>
                                            <div class="form-group">
                                                <label for="img">Img</label>
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" name="description">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_categories">Id_categories</label>
                                                <select name="id_categories" class="form-control" >
                                                    <?php foreach ($listCategories as $listCategori) { ?>
                                                        
                                                    <option value="<?php echo $listCategori['id'] ?>"><?php echo $listCategori['name'] ?></option>
                                                    <?php var_dump($listCategories); } ?>
                                                </select>
                                            </div>
                                          
                                            <!-- Thêm các trường khác ở đây -->
                                            <button type="submit" name="addProduct" class="btn btn-success">Thêm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<?php include_once './views/admin/layout/footer.php'; ?>