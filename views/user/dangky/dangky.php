<?php include './views/user/layout/header.php'; ?>

<div class="container">
  <div class="registration__form">
    <div class="row">
      <div class="col-sm-12 col-lg-6">
        <h3 class="heading">ĐĂNG KÝ</h3>

        <form action="?act=nextdangky" method="POST" class="form" id="form-1">
          <div class="form-group">
            <label for="user" class="form-label">Tên Đăng Nhập</label>
            <input id="user" name="user" type="text" placeholder="Nhập tên đăng nhập" class="form-control"
              value="<?= isset($_SESSION['value']['user']) ? $_SESSION['value']['user'] : '' ?>">
            <?php if (isset($_SESSION['user_error'])): ?>
              <h3 class="btn btn-danger"><?= $_SESSION['user_error']; ?></h3>
              <?php unset($_SESSION['user_error']); ?>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="password" class="form-label">Mật Khẩu</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control"
              value="<?= isset($_SESSION['value']['password']) ? $_SESSION['value']['password'] : '' ?>">
            <?php if (isset($_SESSION['password_error'])): ?>
              <p class="btn btn-danger"><?= $_SESSION['password_error']; ?></p>
              <?php unset($_SESSION['password_error']); ?>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" placeholder="VD: email@domain.com" class="form-control"
              value="<?= isset($_SESSION['value']['email']) ? $_SESSION['value']['email'] : '' ?>">
            <?php if (isset($_SESSION['email_error'])): ?>
              <p class="btn btn-danger"><?= $_SESSION['email_error']; ?></p>
              <?php unset($_SESSION['email_error']); ?>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="address" class="form-label">Địa Chỉ</label>
            <input id="address" name="address" type="text" placeholder="VD: 123 Nguyễn Trãi, Hà Nội"
              class="form-control"
              value="<?= isset($_SESSION['value']['address']) ? $_SESSION['value']['address'] : '' ?>">
            <?php if (isset($_SESSION['address_error'])): ?>
              <p class="btn btn-danger"><?= $_SESSION['address_error']; ?></p>
              <?php unset($_SESSION['address_error']); ?>
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="tel" class="form-label">Số Điện Thoại</label>
            <input id="tel" name="tel" type="tel" placeholder="VD: 0123456789" class="form-control"
              value="<?= isset($_SESSION['value']['tel']) ? $_SESSION['value']['tel'] : '' ?>">
            <?php if (isset($_SESSION['tel_error'])): ?>
              <p class="btn btn-danger"><?= $_SESSION['tel_error']; ?></p>
              <?php unset($_SESSION['tel_error']); ?>
            <?php endif; ?>
          </div>

          <button name="addUser" class="form-submit btn-blocker" style="border-radius: unset;">Đăng Ký <i
              class="fas fa-arrow-right" style="font-size: 16px; margin-left: 10px;"></i></button>
          <p style="font-size: 16px; margin: 10px 0;">Bạn đã có tài khoản? <a href="?act=dangnhap"
              style="color: black; font-weight: bold">Đăng nhập</a></p>
        </form>


      </div>

      <div class="col-sm-12 col-lg-6">
        <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
        <p class="text-login">Đăng nhập bằng tài khoản sẽ giúp bạn truy cập:</p>
        <ul>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Một lần đăng nhập chung duy nhất để tương tác với các sản phẩm và dịch vụ của shop</p>
          </li>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Thanh toán nhanh hơn</p>
          </li>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Xem lịch sử đặt hàng riêng của bạn</p>
          </li>
          <li class="text-login-item"><i class="fas fa-check"></i>
            <p class="text-login">Thêm hoặc thay đổi tùy chọn email</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<?php include './views/user/layout/footer.php'; ?>