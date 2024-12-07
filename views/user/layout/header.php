<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P&T Shop</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- link font chữ -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
  <!-- link icon -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="./views/user/assets/base.css">
  <link rel="stylesheet" href="./views/user/assets/login.css">
  <link rel="stylesheet" href="./views/user/assets/main1.css">
  <link rel="stylesheet" href="./views/user/assets/intro.css">
  <link rel="stylesheet" href="./views/user/assets/reponsive1.css">
  <link rel="stylesheet" href="./views/user/assets/css/account.css">
  <link rel="stylesheet" href="./views/user/assets/css/cart.css">
  <link rel="stylesheet" href="./views/user/assets/css/login.css">
  <link rel="stylesheet" href="./views/user/assets/css/main.css">
  <link rel="stylesheet" href="./views/user/assets/css/news.css">
  <link rel="stylesheet" href="./views/user/assets/css/pay.css">
  <link rel="stylesheet" href="./views/user/assets/css/product.css">
  <link rel="stylesheet" href="./views/user/assets/css/productdetail.css">
  <link rel="stylesheet" href="./views/user/assets/css/reponsive1.css">

  <link rel="icon" href="assets/img/logo/main.png" type="image/x-icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<style>
  .right{
    margin-left: 120px;
  }
  .svt{
    left: 150px;
  }
</style>
</head>
<body style="background-color: rgb(248, 242, 236);">
  <div class="overlay hidden"></div>
  <!-- mobile menu -->
  <header class="header">
    <div class="container">
      <div class="top-link clearfix hidden-sm hidden-xs">
        <div class="row">
          <div class="col-6 social_link">
            <div class="social-title">Theo dõi: </div>
            <a href="#"><i class="fab fa-facebook" style="font-size: 24px; margin-right: 10px;color: blue;"></i></a>
            <a href="#"><i class="fab fa-instagram" style="font-size: 24px; margin-right: 10px;color: pink;"></i></a>
            <a href="#"><i class="fab fa-youtube" style="font-size: 24px; margin-right: 10px;color: red;"></i></a>
            <a href="#"><i class="fab fa-twitter" style="font-size: 24px; margin-right: 10px;color: blue;"></i></a>
          </div>
          <div class="col-6 login_link svt">
            <?php if (isset($_SESSION['account']) ) {
              // print_r($_SESSION['account']);
              ?>
              <ul class="m-auto svt">
                <li class="nav-item nav-item__first nav-item__first-user">
                  <img src="./views/user/assets/img/product/noavatar.png" alt="" class="nav-item__first-img">
                  <span class="nav-item__first-name"><?= $_SESSION['account']['user'] ?></span>
                  <ul class="nav-item__first-menu">
                    <?php if (isset($_SESSION['account']['role']) && $_SESSION['account']['role'] == 1): ?>
                      <li class="nav-item__first-item">
                        <a href="?act=admin/statistical">
                          <i class="fas fa-chart-line"></i> Trang quản trị
                        </a>
                      </li>
                    <?php endif; ?>
                    <li class="nav-item__first-item">
                      <a href="?act=user/edit">
                        <i class="fas fa-user"></i> Tài khoản của tôi
                      </a>
                    </li>
                    <li class="nav-item__first-item">
                      <a href="?act=user/order_history">
                        <i class="fas fa-user"></i> Lịch sử mua hàng
                      </a>
                    </li>
                    <li class="nav-item__first-item">
                      <a href="?act=user/dangxuat">
                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <?php
            } else {
              ?>
              <ul class="header_link right">
                <li>
                  <a href="?act=user/dangnhap"><i class="fas fa-sign-in-alt mr-3 ml-5 mt-3"></i>Đăng nhập</a>
                </li>
                <li>
                  <a href="?act=user/dangky"><i class="fas fa-user-plus mr-3 ml-5 mt-3" style="margin-left: 10px;"></i>Đăng kí</a>
                </li>
              </ul>
            <?php } ?>

          </div>
        </div>
      </div>
      <div class="header-main clearfix">
        <div class="row">
          <div class="col-lg-3 col-100-h">
            <div id="trigger-mobile" class="visible-sm visible-xs"><i class="fas fa-bars"></i></div>
            <div class="logo">
              <a href="?act=trangchu">
                <img src="./views/user/assets/img/logo/logomain.png" alt="">
              </a>
            </div>
            <div class="mobile_cart visible-sm visible-xs">
              <a href="#" class="header__second__cart--icon">
                <i class="fas fa-shopping-cart"></i>
                <span id="header__second__cart--notice" class="header__second__cart--notice">3</span>
              </a>
              <a href="#" class="header__second__like--icon">
                <i class="far fa-heart"></i>
                <span id="header__second__like--notice" class="header__second__like--notice">3</span>
              </a>
            </div>
          </div>
          <div class="col-lg-6 m-auto pdt15">
            <form class="example" action="?act=search_product" method="POST">
              <input type="text" class="input-search" placeholder="Tìm kiếm.." name="search">
              <button type="submit" name="submit" class="search-btn">Tìm kiếm</button>
            </form>
          </div>
          <div class="col-3 m-auto hidden-sm hidden-xs">
          
            <?php if (isset($_SESSION['account'])) {
              ?>
              <div class="item-car clearfix">
                <a href="?act=giohang" class="header__second__cart--icon">
                  <i class="fas fa-shopping-cart"></i>
                </a>
              </div>
              <?php
            }
            ?>
            <!-- <div class="item-like clearfix">
              <a href="./listlike.html" class="header__second__like--icon">
                <i class="far fa-heart"></i>
                <span id="header__second__like--notice" class="header__second__like--notice">3</span>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <nav class="header_nav hidden-sm hidden-xs">
      <div class="container">
        <ul class="header_nav-list nav">
          <li class="header_nav-list-item"><a href="?act=trangchu" class="active">Trang chủ</a></li>
          <li class="header_nav-list-item"><a href="?act=intro">Giới thiệu</a></li>
          <li class="header_nav-list-item has-mega">
            <a href="?act=product">Sản phẩm<i class="fas fa-angle-right" style="margin-left: 5px;"></i></a>
            <!-- <div class="mega-content" style="overflow-x: hidden;">
              <div class="row">
                <ul class="col-8 no-padding level0">
                  <li class="level1">
                    <a class="hmega" href="?act=product">Tất cả sản phẩm</a>
                    <ul class="level1">
                      <li class="level2"><a href="">Bóng đá</a></li>
                      <li class="level2"><a href="">Bóng đá</a></li>
                      <li class="level2"><a href="">Bóng đá</a></li>
                      <li class="level2"><a href="">Bóng đá</a></li>
                    </ul>
                  </li>
                </ul>
                <div class="col-4">
                  <a href="">
                    <picture>
                      <img src="https://media.giphy.com/media/mj7HcKFq23oobJMcOG/giphy.gif" alt="" width="80%">
                    </picture>
                  </a>
                </div>
              </div>
            </div> -->
          </li>
          <li class="header_nav-list-item"><a href="?act=news">Tin tức</a></li>
          <li class="header_nav-list-item"><a href="?act=lienhe">Liên hệ</a></li>
        </ul>
      </div>
    </nav>
  </header>