<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang danh sách thành viên</h1>
                </div>
            </div>
        </div>
    </section>
    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
        <h3>
            <ul class="text-danger">
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </h3>
        <?php unset($_SESSION['errors']);?>
    <?php endif; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <h4 class="text-success"><?php if(isset($_SESSION['success'])) echo $_SESSION['success']; unset($_SESSION['success']); ?></h4>
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>user</th>
                                        <th>email</th>
                                        <th>address</th>
                                        <th>tel</th>
                                        <th>role</th>
                                        <th>status</th>
                                        <th>create_at</th>
                                        <th>update_at</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataUser as $value) { ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['user'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['address'] ?></td>
                                            <td><?= $value['tel'] ?></td>
                                            <td><?= $value['role'] == 1 ? 'Admin' : 'Thành viên' ?></td>
                                            <td><?= $value['status'] == 0 ? 'active' : 'locked' ?></td>
                                            <td><?= $value['create_at'] ?></td>
                                            <td><?= $value['update_at'] ?></td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="?act=admin/user/edit&id=<?= $value['id'] ?>">Edit</a>
                                                <a class="btn btn-danger"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa thành viên: <?= $value['user'] ?> ?');"
                                                    href="?act=admin/user/delete&id=<?= $value['id'] ?>">Delete</a>
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