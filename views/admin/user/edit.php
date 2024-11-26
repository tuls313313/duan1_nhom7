<?php include_once './views/admin/layout/header.php'; ?>

<?php include_once './views/admin/layout/navbar.php'; ?>

<?php include_once './views/admin/layout/siderbar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang chỉnh sửa thành viên: <?php echo $dataOneUser['user']; ?> </h1>
                </div>
            </div>
        </div> 
        <div class="text-danger">
            <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
                <h3>
                    <ul class="text-danger">
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </h3>
                <?php unset($_SESSION['errors']);
                    ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="?act=admin/user/nextedit&id=<?= $dataOneUser['id'] ?>" method="POST">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="user">User</label>
                                <input type="text" class="form-control" name="user"
                                    value="<?php echo $dataOneUser['user']; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" value="<?php echo $dataOneUser['password']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="<?php echo $dataOneUser['email']; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="<?php echo $dataOneUser['address']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tel">tel</label>
                            <input type="text" class="form-control" name="tel"
                                value="<?php echo $dataOneUser['tel']; ?>" readonly>
                            <div class="form-group">
                                <label for="role">role</label>
                                <select class="form-control" name="role">
                                    <option value="0" <?php echo $dataOneUser['role'] == 0 ? 'selected' : ''; ?>>
                                        Thành viên</option>
                                    <option value="1" <?php echo $dataOneUser['role'] == 1 ? 'selected' : ''; ?>>
                                        Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">status</label>
                                <select class="form-control" name="status">
                                    <option value="0" <?php echo $dataOneUser['status'] == 0 ? 'selected' : ''; ?>>active
                                    </option>
                                    <option value="1" <?php echo $dataOneUser['status'] == 1 ? 'selected' : ''; ?>>locked
                                    </option>
                                </select>
                            </div>
                            <button type="submit" name="editUser" class="btn btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once './views/admin/layout/footer.php'; ?>