<!-- header -->
<?php include './views/user/layout/header.php'; ?>
<!-- end header -->
<!-- content -->
<div class="container">
  <!-- slide show -->
<!-- <?php include './views/user/layout/slider.php'; ?> -->

  <!-- end slide show -->
  <div class="product">
    <div class="container">
      <!-- <div class="product_popular">
        <h3 class="product__popular title-product">Sản phẩm phổ biến</h3>
        <div class="row">
          <div class="col-lg-4 col-sm-12 mb-20">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="./views/user/assets/img/product/addidas1.jpg" alt="Card image"
                style="width:100%">
              <div class="card-body">
                <h4 class="card-title">Joma Super Regate</h4>
                <p class="card-text description" style="font-weight: 400;">Phần trên được sản xuất bằng cách sử dụng sợi
                  nhỏ, nylon và TPU chèn trên nylon để bảo vệ chống nứt nẻ
                  . Joma Super Regate bao gồm công nghệ BẢO VỆ ở cổ chân để tăng cường sức đề kháng
                  và sự ổn định cho đòn đánh. Joma Super Regate có hệ thống thông gió VTS cho phép thở và
                  luồng không khí lớn hơn bên trong giày.
                  Đế lót EVA định hình sẵn có thể điều chỉnh theo hình dạng của bàn chân.
                  Đế được sản xuất bằng EVA tự nhiên góp phần tạo đệm cho giày bằng cách
                  hấp thụ tác động từ bàn chân.</p>
                <a href="?act=chitietsp" title="GIÀY ADIDAS 4D FUTURECRAFT" class="btn btn-buynow">Xem ngay <i
                    class="fas fa-arrow-right" style="font-size: 16px;margin-left: 5px;"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="./views/user/assets/img/product/stansmith.jpg" alt="Card image"
                style="width:100%">
              <div class="card-body">
                <h4 class="card-title">adidas stan smith</h4>
                <p class="card-text description" style="font-weight: 400;">Đúng chất kinh điển.
                  Trước đây, Stan Smith từng là ngôi sao lớn của làng quần vợt.
                  Mang đôi giày adidas xứng tầm tên tuổi của ông, bạn sẽ là ngôi sao đường phố.
                  Từ trên xuống dưới, đôi giày kinh điển này bắt trọn tinh hoa phong cách của kiểu dáng nguyên bản năm
                  1971,
                  với thiết kế bằng da tối giản và đường nét gọn gàng.</p>
                <a href="?act=chitietsp" class="btn btn-buynow">Xem ngay <i class="fas fa-arrow-right "
                    style="font-size: 16px;margin-left: 5px;"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="./views/user/assets/img/product/stansmith.jpg" alt="Card image"
                style="width:100%">
              <div class="card-body">
                <h4 class="card-title">adidas stan smith</h4>
                <p class="card-text description" style="font-weight: 400;">Đúng chất kinh điển.
                  Trước đây, Stan Smith từng là ngôi sao lớn của làng quần vợt.
                  Mang đôi giày adidas xứng tầm tên tuổi của ông, bạn sẽ là ngôi sao đường phố.
                  Từ trên xuống dưới, đôi giày kinh điển này bắt trọn tinh hoa phong cách của kiểu dáng nguyên bản năm
                  1971,
                  với thiết kế bằng da tối giản và đường nét gọn gàng.</p>
                <a href="?act=chitietsp" class="btn btn-buynow">Xem ngay <i class="fas fa-arrow-right "
                    style="font-size: 16px;margin-left: 5px;"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="product__new">
        <h3 class="product__ne title-product">Sản phẩm mới</h3>
        <div class="row">
          <?php foreach ($datahome as $home) { ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20 mt-2">
              <a href="?act=chitietsp&id=<?= $home['id'] ?>" class="product__new-item">
                <div class="card" style="width: 100%">
                  <div>
                    <img class="card-img-top" src="./uploads/upimg/<?= $home['img'] ?>" alt="">
                    <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="?act=thanhtoan" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a href="?act=chitietsp&id=<?= $home['id'];?>" class="btn-add-to-cart" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                      <!-- <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a> -->
                    </form>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title description">
                      <?= $home['name'] ?>
                    </h5>
                    <div class="product__price">
                      <!-- <p class="card-text price-color product__price-old"><?= $home['price'] ?></p> -->
                      <p class="card-text price-color product__price-new">
                        <td><?php echo number_format($home['price'] ?? 0, 0, ',', '.') . ' VND'; ?></td>
                      </p>
                    </div>
                    <div class="home-product-item__action">
                      <!-- <span class="home-product-item__like home-product-item__like--liked">
                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                      </span> -->
                      <div class="home-product-item__rating">
                        <!-- <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="fas fa-star"></i> -->
                      </div>
                      <span class="home-product-item__sold"><?= $home['total_sold'] ?? 0 ?> đã bán</span>
                    </div>
                    <!-- <div class="sale-off">
                      <span class="sale-off-percent">20%</span>
                      <span class="sale-off-label">GIẢM</span>
                    </div> -->
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>

      </div>
      <div class="product__sale">
        <h3 class="product__sale title-product">Top sản phẩm hot</h3>
        <div class="row">
          <?php foreach ($dataviews as $homeviews) { ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
              <a href="?act=chitietsp&id=<?= $homeviews['id'] ?>" class="product__new-item">
                <div class="card" style="width: 100%">
                  <div>
                    <img class="card-img-top" src="./uploads/upimg/<?= $homeviews['img'] ?>" alt="Card image cap">
                    <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="?act=thanhtoan&id=<?=  $homeviews['id'];?>" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a href="?act=chitietsp&id=<?= $homeviews['id'];?>" class="btn-add-to-cart" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title description">
                      <?= $homeviews['name'] ?>
                    </h5>
                    <div class="product__price">
                      <!-- <p class="card-text price-color product__price-old">1,000,000 đ</p> -->
                      <p class="card-text price-color product__price-new">
                        <?php echo number_format($homeviews['price'] ?? 0, 0, ',', '.') . ' VND'; ?></p>
                    </div>
                    <div class="home-product-item__action">
                      <span class="home-product-item__like home-product-item__like--liked">
                        <i class="home-product-item__like-icon-fill fas fa-eye mr-2"></i>
                        <?= $homeviews['views'] ?>
                      </span>
                      <div class="home-product-item__rating">
                        <!-- <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="fas fa-star"></i> -->
                      </div>
                      <span class="home-product-item__sold"><?= $homeviews['total_sold'] ?? 0 ?> đã bán</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
      <section class="awe-section-9">
        <div class="section_policy clearfix">
          <div class="col-12">
            <div class="owl-policy-mobile">
              <div class="owl-stage-outer">
                <div class="owl-stage">
                  <div class="owl-item">
                    <div class="section_policy_content">

                      <img
                        src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_1.png?1628514159582"
                        alt="">
                      <div class="section-policy-padding">
                        <h3>Miễn phí vận chuyển</h3>
                        <div class="section_policy_title">Cho các đơn hàng</div>
                      </div>

                    </div>
                  </div>
                  <div class="owl-item">
                    <div class="section_policy_content">

                      <img
                        src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_2.png?1628514159582"
                        alt="">
                      <div class="section-policy-padding">
                        <h3>Hỗ trợ 24/7</h3>
                        <div class="section_policy_title">Liên hệ hỗ trợ 24h/ngày</div>
                      </div>

                    </div>
                  </div>
                  <div class="owl-item">
                    <div class="section_policy_content">

                      <img
                        src="	https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_3.png?1628514159582"
                        alt="">
                      <div class="section-policy-padding">
                        <h3>Hoàn tiền 100%</h3>
                        <div class="section_policy_title">Nếu sản phẩm bị lỗi, hư hỏng</div>
                      </div>

                    </div>
                  </div>
                  <div class="owl-item">
                    <div class="section_policy_content">

                      <img
                        src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_4.png?1628514159582"
                        alt="">
                      <div class="section-policy-padding">
                        <h3>Thanh toán</h3>
                        <div class="section_policy_title">Được bảo mật 100%</div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <div class="product__yml">
        <h3 class="product__yml title-product">Có thể bạn sẽ thích</h3>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
            <a href="?act=chitietsp" class="product__new-item">
              <div class="card" style="width: 100%">
                <div>
                  <img class="card-img-top" src="./views/user/assets/img/product/sandalduramo1.jpg"
                    alt="Card image cap">
                  <form action="" class="hover-icon hidden-sm hidden-xs">
                    <input type="hidden">
                    <a href="?act=thanhtoan" class="btn-add-to-cart" title="Mua ngay">
                      <i class="fas fa-cart-plus"></i>
                    </a>
                    <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                      <i class="fas fa-search"></i>
                    </a>
                  </form>
                </div>
                <div class="card-body">
                  <h5 class="card-title description">
                    Giày sandan
                  </h5>
                  <div class="product__price">
                    <p class="card-text price-color product__price-old">1,000,000 đ</p>
                    <p class="card-text price-color product__price-new">1,000,000 đ</p>
                  </div>
                  <div class="home-product-item__action">
                    <span class="home-product-item__like home-product-item__like--liked">
                      <i class="home-product-item__like-icon-empty far fa-heart"></i>
                      <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                    </span>
                    <div class="home-product-item__rating">
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <span class="home-product-item__sold">79 đã bán</span>
                  </div>
                  <div class="sale-off">
                    <span class="sale-off-percent">20%</span>
                    <span class="sale-off-label">GIẢM</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
            <a href="?act=chitietsp" class="product__new-item">
              <div class="card" style="width: 100%">
                <div>
                  <img class="card-img-top" src="./views/user/assets/img/product/stansmithgolf2.jpg"
                    alt="Card image cap">
                  <form action="" class="hover-icon hidden-sm hidden-xs">
                    <input type="hidden">
                    <a href="?act=thanhtoan" class="btn-add-to-cart" title="Mua ngay">
                      <i class="fas fa-cart-plus"></i>
                    </a>
                    <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                      <i class="fas fa-search"></i>
                    </a>
                  </form>
                </div>
                <div class="card-body">
                  <h5 class="card-title description">
                    Adidas stansmith
                  </h5>
                  <div class="product__price">
                    <p class="card-text price-color product__price-old">1,000,000 đ</p>
                    <p class="card-text price-color product__price-new">1,000,000 đ</p>
                  </div>
                  <div class="home-product-item__action">
                    <span class="home-product-item__like home-product-item__like--liked">
                      <i class="home-product-item__like-icon-empty far fa-heart"></i>
                      <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                    </span>
                    <div class="home-product-item__rating">
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <span class="home-product-item__sold">79 đã bán</span>
                  </div>
                  <div class="sale-off">
                    <span class="sale-off-percent">20%</span>
                    <span class="sale-off-label">GIẢM</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
            <a href="?act=chitietsp" class="product__new-item">
              <div class="card" style="width: 100%">
                <div>
                  <img class="card-img-top" src="./views/user/assets/img/product/superfly1.jpg" alt="Card image cap">
                  <form action="" class="hover-icon hidden-sm hidden-xs hidden-sm hidden-xs">
                    <input type="hidden">
                    <a href="?act=thanhtoan" class="btn-add-to-cart" title="Mua ngay">
                      <i class="fas fa-cart-plus"></i>
                    </a>
                    <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                      <i class="fas fa-search"></i>
                    </a>
                  </form>
                </div>
                <div class="card-body">
                  <h5 class="card-title description">
                    Giày bóng đá
                  </h5>
                  <div class="product__price">
                    <p class="card-text price-color product__price-old">1,000,000 đ</p>
                    <p class="card-text price-color product__price-new">1,000,000 đ</p>
                  </div>
                  <div class="home-product-item__action">
                    <span class="home-product-item__like home-product-item__like--liked">
                      <i class="home-product-item__like-icon-empty far fa-heart"></i>
                      <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                    </span>
                    <div class="home-product-item__rating">
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <span class="home-product-item__sold">79 đã bán</span>
                  </div>
                  <div class="sale-off">
                    <span class="sale-off-percent">20%</span>
                    <span class="sale-off-label">GIẢM</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="?act=chitietsp" class="product__new-item">
              <div class="card" style="width: 100%">
                <div>
                  <img class="card-img-top" src="./views/user/assets/img/product/tatchaybo1.jpg" alt="Card image cap">
                  <form action="" class="hover-icon hidden-sm hidden-xs">
                    <input type="hidden">
                    <a href="?act=thanhtoan" class="btn-add-to-cart" title="Mua ngay">
                      <i class="fas fa-cart-plus"></i>
                    </a>
                    <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                      <i class="fas fa-search"></i>
                    </a>
                  </form>
                </div>
                <div class="card-body">
                  <h5 class="card-title description">
                    Tất
                  </h5>
                  <div class="product__price">
                    <p class="card-text price-color product__price-old">1,000,000 đ</p>
                    <p class="card-text price-color product__price-new">1,000,000 đ</p>
                  </div>
                  <div class="home-product-item__action">
                    <span class="home-product-item__like home-product-item__like--liked">
                      <i class="home-product-item__like-icon-empty far fa-heart"></i>
                      <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                    </span>
                    <div class="home-product-item__rating">
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="home-product-item__star--gold fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <span class="home-product-item__sold">79 đã bán</span>
                  </div>
                  <div class="sale-off">
                    <span class="sale-off-percent">20%</span>
                    <span class="sale-off-label">GIẢM</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div> -->
    </div>
  </div>
  <div class="shoesnews">
    <div class="container">
      <h3 class="shoesnews__title">Tin tức</h3>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 mb-20">
          <a href="?act=news" class="product__new-item">
            <div class="card" style="width: 100%">
              <img class="card-img-top" src="./views/user/assets/img/product/new2.jpg" alt="Card image cap"
                height="230px">
              <div class="card-body">
                <h5 class="card-title description title-news">
                  Tin tức về giày puma
                </h5>
                <p class="card-text description" style="font-weight: 400;">Trong phạm vi bài viết ngày hôm nay, hãy cùng
                  Thanh Hùng Futsal khám phá mẫu giày
                  đá bóng độc nhất vô nhị được nhà Swoosh thửa riêng cho cậu bé vàng của xứ sở Lục Lăng nhé! </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 mb-20">
          <a href="?act=news" class="product__new-item">
            <div class="card" style="width: 100%">
              <img class="card-img-top" src="./views/user/assets/img/product/new1.jpg" alt="Card image cap"
                height="230px">
              <div class="card-body">
                <h5 class="card-title description title-news">
                  Người sáng lập đế chế puma
                </h5>
                <p class="card-text description" style="font-weight: 400;">"PUMA ra mắt KING TOP DASSLER phiên bản giới
                  hạn
                  20/11/2021
                  Nhằm tôn vinh những di sản mà Rudolph Dassler, người sáng lập Puma để lại, mới đây hãng thể thao nước
                  Đức đã cho ra đời phiên bản Puma King Top Dassler
                  với chỉ giới hạn 100 đôi trên toàn thế giới.
                  Đôi giày đá banh được thiết kế theo phong cách đơn giản, đúng với tinh thần của dòng sản phẩm Puma
                  King
                  . Upper là chất liệu da Kangaroo cao cấp với tone màu trắng chủ đạo lấy ý tưởng từ những bộ
                  quần áo sạch sẽ mà cậu bé Dassler đã giặt thuê từ khi còn nhỏ,
                  thông qua đó cũng xây dựng lên tinh thần kinh doanh và ý chí khởi nghiệp từ sớm của cậu.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 mb-20">
          <a href="?act=news" class="product__new-item">
            <div class="card" style="width: 100%">
              <img class="card-img-top" src="./views/user/assets/img/product/new3.jpg" alt="Card image cap"
                height="230px">
              <div class="card-body">
                <h5 class="card-title description title-news">
                  Thông tin bên lề Uero
                </h5>
                <p class="card-text description" style="font-weight: 400;">"Bóng đá đã trở lại", câu nói tưởng chừng
                  bình thường nhưng lại vô cùng ý nghĩa trong thời điểm hiện tại, khi mà chúng ta đang phải sống chung
                  với đại dịch Covid-19.
                  Các sân vận động chật kín cổ động viên với các tràng vỗ tay,
                  tiếng cổ vũ cũng là một hình ảnh đánh dấu chiến thắng của nhân loại trước Covid-19.
                  Bên cạnh các trận đấu bóng đá đỉnh cao đang diễn ra khắp các sân cỏ trên toàn thế giới,
                  thì các ông lớn như Nike, adidas hay Puma, v.v...</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="shoesnews__all">
        <a href="?act=product" class="shoesnews__all-tittle">Xem tất cả</a> <i class="fi-rs-angle-right"></i>
      </div>
    </div>
  </div>
</div>
<!-- footer -->
<?php include './views/user/layout/footer.php'; ?>
<div id="go-to-top">
  <a class="btn-gototop"><i class="fas fa-arrow-up"></i></a>
</div>
<!-- end footer -->
<!-- modal -->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">

      <!-- Modal Header -->
      <!-- <div class="modal-header">
          <h4 class="modal-title">Giày ADIDAS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> -->

      <!-- Modal body -->
      <!-- <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <div class="mb-2 main-img-2">
              <img src="./views/user/assets/img/product/ars1.jpg" alt="" id="img-main"
                xoriginal="./views/user/assets/img/product/ars1.jpg">
            </div>
            <ul class="all-img-2">
              <li class="img-item-2">
                <img src="./views/user/assets/img/product/ars1.jpg" alt="" onclick="changeImg('one')" id="one">
              </li>
              <li class="img-item-2">
                <img src="./views/user/assets/img/product/ars2.jpg" alt="" onclick="changeImg('two')" id="two">
              </li>
              <li class="img-item-2">
                <img src="./views/user/assets/img/product/ars3.jpg" alt="" onclick="changeImg('three')" id="three">
              </li>
              <li class="img-item-2">
                <img src="./views/user/assets/img/product/ars4.jpg" alt="" onclick="changeImg('four')" id="four">
              </li>
            </ul>
          </div>
          <div class="col-6">
            <div class="info-product">
              <h3 class="product-name">
                <a href="" title="">Giày ADIDAS</a>
              </h3>
              <div class="status-product">
                Trạng thái: <b>Còn hàng</b>
              </div>
              <div class="infor-oder">
                Loại sản phẩm: <b>Giày dép</b>
              </div>
              <div class="price-product">
                <div class="special-price">
                  <span>540.000đ</span>
                </div>
                <div class="price-old">
                  Giá gốc:
                  <del>650.000đ</del>
                  <span class="discount">(-20%)</span>
                </div>
              </div>
              <div class="product-description">
                Đầu tháng /2021, Nike chính thức trình
                làng thế hệ tiếp theo của dòng giày đá bóng huyền thoại
                thuộc nhà Swoosh là Tiempo Legend 9. Được mệnh danh là
                thế hệ nhẹ nhất từ trước đến nay của dòng giày đá bóng Tiempo,
                Legend 9 đã có những thay đổi đáng kể
                về mặt thiết kế lẫn công nghệ nhằm giúp người chơi có thể tự
                tin và phát huy tối đa khả năng khi chơi bóng.
              </div>

              <div class="product__color d-flex" style="align-items: center;">
                <div class="title" style="font-size: 16px; margin-right: 10px;">
                  Màu:
                </div>
                <div class="select-swap d-flex">

                  <div class="circlecheck">
                    <input type="radio" id="f-option" class="circle-1" name="selector" checked>
                    <label for="f-option"></label>
                    <div class="outer-circle"></div>
                  </div>
                  <div class="circlecheck">
                    <input type="radio" id="g-option" class="circle-2" name="selector">
                    <label for="g-option"></label>
                    <div class="outer-circle"></div>
                  </div>
                  <div class="circlecheck">
                    <input type="radio" id="h-option" class="circle-3" name="selector">
                    <label for="h-option"></label>
                    <div class="outer-circle"></div>
                  </div>
                </div>
              </div>
              <div class="product__size d-flex" style="align-items: center;">
                <div class="title" style="font-size: 16px; margin-right: 10px;">
                  Kích thước:
                </div>
                <div class="select-swap">
                  <div class="swatch-element" data-value="38">
                    <input type="radio" class="variant-1" id="swatch-1-38" name="mau" value="trung" onclick="check()">
                    <label for="swatch-1-38" class="sd"><span>38</span></label>
                  </div>
                  <div class="swatch-element" data-value="39">
                    <input type="radio" class="variant-1" id="swatch-1-39" name="mau" value="thanh" onclick="check()">
                    <label for="swatch-1-39" class="sd"><span>39</span></label>
                  </div>
                  <div class="swatch-element" data-value="40">
                    <input type="radio" class="variant-1" id="swatch-1-40" name="mau" value="hieu" onclick="check()">
                    <label for="swatch-1-40" class="sd"><span>40</span></label>
                  </div>
                </div>
              </div>
              <div class="product__wrap">
                <div class="product__amount">
                  <label for="">Số lượng: </label>
                  <input type="button" value="-" class="control" onclick="tru()">
                  <input type="text" value="1" class="text-input" id="text_so_luong" onkeypress='validate(event)'>
                  <input type="button" value="+" class="control" onclick="cong()">
                </div>
              </div>
              <div class="product__shopnow">
                <a href="?act=thanhtoan&id="> <button class="shopnow2">Mua ngay</button></a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <button class="btn-default btn-close" data-dismiss="modal">
        <i class="fas fa-times-circle"></i>
      </button> -->
      <!-- Modal footer -->
      <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->

    </div>
  </div>
</div>
<!-- end modal -->
<script src="./views/user/assets/css/main.js"></script>