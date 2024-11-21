
<?php include './views/user/layout/header.php'; ?>
<!-- <div class="container"> -->

<!-- <?php include './views/user/layout/slider.php'; ?> -->
<style>
  form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }

  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }

  form.example button:hover {
    background: #0b7dda;
  }

  form.example::after {
    content: "";
    clear: both;
    display: table;
  }

  /* Mobile & tablet  */
  @media (max-width: 1023px) {
    .custom-btn {
      margin: unset;
    }
  }

  /* tablet */
  @media (min-width: 740px) and (max-width: 1023px) {
    .btn-blocker {
      display: block;
      width: 100%;
    }

    .show-hide {
      top: 56px;
    }

    .show-hide-two {
      top: 56px;
    }
  }

  /* mobile */
  @media (max-width: 739px) {
    .btn-blocker {
      display: block;
      width: 100%;
    }

    .show-hide {
      top: 56px;
    }

    .show-hide-two {
      top: 56px;
    }
  }
</style>
<div class="container">
    <div class="registration__form">
      <div class="row">
        <div class="col-sm-12 col-lg-6">
          <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">ĐĂNG KÍ</h3>
            <div class="form-group">
              <label for="fullname" class="form-label">Tên đầy đủ</label>
              <input id="fullname" name="fullname" type="text" placeholder="VD: Quốc Trung" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group matkhau">
              <label for="password" class="form-label">Mật khẩu</label>
              <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
              <span class="show-hide"><i class="fas fa-eye"></i></span>
              <span class="form-message"></span>
            </div>

            <div class="form-group matkhau">
              <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
              <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu"
                type="password" class="form-control">
              <span class="show-hide-two"><i class="fas fa-eye fa-eye-2"></i></span>
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="gender" class="form-label">Giới tính</label>
              <div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" value="male">Nam
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" value="female">Nữ
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" value="order">Khác
                </div>
              </div>
              <span class="form-message"></span>
            </div>

            <button class="form-submit btn-blocker" style="border-radius: unset;">Đăng ký <i class="fas fa-arrow-right"
                style="font-size: 16px;margin-left: 10px;"></i></button>
            <p style="font-size: 16px;margin: 10px 0;">Bạn đã có tài khoản? <a href="?act=dangnhap"
                style="color: black; font-weight: bold">Đăng nhập</a></p>
          </form>
        </div>
        <div class="col-sm-12 col-lg-6">
          <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
          <p class="text-login">Đăng nhập bằng tài khoản sẽ giúp bạn truy cập:</p>
          <ul>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Một lần đăng nhập chung duy nhất để tương tác với các sản phẩm và dịch vụ của P&T
                shop
              </p>
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