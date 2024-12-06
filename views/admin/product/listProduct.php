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
                    <iv class="card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Danh Sách Sản Phẩm </h3>
                            </div>
                            <!-- card header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                               <a class="btn btn-success mb-2" href="?act=admin/product/add">Thêm sản phẩm</a>
                               <h4 class="text-success"><?php if(isset($_SESSION['success'])) echo $_SESSION['success']; unset($_SESSION['success']); ?></h4>

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
                                                <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $value['description'] ?></td>
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
                    </div>
                </div>
            </div>
    </section>
</div>

<?php include_once './views/admin/layout/footer.php'; ?>