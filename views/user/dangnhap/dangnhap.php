
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
  }
</style>
<div class="container">
    <div class="login__form">
      <div class="row">
        <div class="col-sm-12 col-lg-6">
          <form action="" method="POST" class="form" id="form-2">
            <h3 class="heading">ĐĂNG NHẬP</h3>
            <a href="" class="form__forgot-password">Bạn quên mật khẩu?</a>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group matkhau">
              <label for="password" class="form-label">Mật khẩu</label>
              <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
              <span class="show-hide"><i class="fas fa-eye" onclick="myFunction()"></i></span>
              <!-- <i class="fi-rs-eye-crossed undisplay" onclick="showhide()"></i> -->
              <span class="form-message"></span>
            </div>
            <button class="form-submit btn-blocker" style="border-radius: unset;">ĐĂNG NHẬP <i class="fas fa-arrow-right"
                style="font-size: 16px;margin-left: 10px;"></i></button>
            <h4>HOẶC</h4>
            <div class="form-social">
              <a href="" class="form-submit-social btn-blocker">
                <span>Facebook</span>
                <img src="./views/user/assets/icon/facebook.svg" alt="" class="form-submit-social--img">
              </a>
              <a href="" class="form-submit-social btn-blocker">
                <span>GOOGLE</span>
                <img src="./views/user/assets/icon/google.svg" alt="" class="form-submit-social--img">
              </a>
            </div>
          </form>
        </div>
        <div class="col-sm-12 col-lg-6">
          <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
          <p class="text-login">Thật dễ dàng tạo một tài khoản. Hãy nhập địa chỉ email của bạn và điền vào mẫu trên
            trang tiếp theo và tận hưởng những lợi ích của việc sở hữu một tài khoản :</p>
          <ul>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Tổng quan đơn giản về thông tin cá nhân của bạn</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Thanh toán nhanh hơn</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Ưu đãi và khuyến mãi độc quyền</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Các sản phẩm mới nhất</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Các bộ sưu tập giới hạn và bộ sưu tập theo mùa mới</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Các sự kiện sắp tới</p>
            </li>
          </ul>
          <a href="?act=dangky"><button class="form-submit btn-blocker custom-btn" style="border-radius: unset;margin:unset">ĐĂNG KÍ <i
                class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button></a>
        </div>
      </div>
    </div>
  </div>


<?php include './views/user/layout/footer.php'; ?>
<script>
  Validator({
    form: '#form-2',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
      // Validator.isRequired('#fullname','Vui lòng nhập tên đầy đủ'),
      Validator.isRequired('#email'),
      Validator.isEmail('#email'),
      Validator.isRequired('#password'),
      Validator.minLength('#password', 6),
      Validator.isRequired('#password_confirmation'),
      // Validator.isRequired('input[name="gender"]'),
      // Validator.isConfirmed('#password_confirmation', function(){
      //   return document.querySelector('#form-1 #password').value;
      // }, 'Mật khẩu nhập lại không chính xác')
    ],
    onSubmit: function (data) {
      // call api
      console.log(data);
    }
  });
</script>
<script>
  const pass_field = document.querySelector('#password');
  const show_btn = document.querySelector('.fa-eye')
  function myFunction() {
    if (pass_field.type === "password") {
      pass_field.type = "text";
      show_btn.classList.add("hide");
    } else {
      pass_field.type = "password";
      show_btn.classList.remove("hide");
    }
  }
      // show_btn.addEventListener("click",function(){

      // });
</script>