<?php include './views/user/layout/header.php'; ?>

<section class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="">
                <div class="card-header">
                    <h3 class="card-title">Thông tin tài khoản</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="user" class="form-label">Tên Đăng Nhập</label>
                            <input name="user" type="text" class="form-control" value="<?php echo $data['user'] ?>"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Địa chỉ e-mail</label>
                            <input name="email" type="text" class="form-control" value="<?php echo $data['email'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="created_at" class="form-label">Ngày Đăng Ký</label>
                            <input id="created_at" name="created_at" type="text" class="form-control"
                                value="<?php echo $data['create_at'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="updated_at" class="form-label">Ngày Cập Nhật</label>
                            <input id="updated_at" name="updated_at" type="text" class="form-control"
                                value="<?php echo $data['update_at'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address"
                                value="<?php echo $data['address']; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="tel" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="tel" value="<?php echo $data['tel']; ?>"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="">
                <div class="card-header">
                    <h3 class="card-title">Thay đổi mật khẩu</h3>
                </div>
                <div class="card-body">
                    <form action="?act=user/nextedit&id=<?php echo $_SESSION['account']['id'] ?>" method="post">
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật Khẩu Mới</label>
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới nếu muốn đổi">
                            <h4 class="text-danger mt-2"><?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; unset($_SESSION['password']); ?>
                             </h4>
                            <button type="submit" name="submit" class="btn btn-primary p-3">Đổi Mật Khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include './views/user/layout/footer.php'; ?>