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

    .sale-off-2 {
        top: 14px;
        right: 14px;
    }

    /* Mobile & tablet  */
    @media (max-width: 1023px) {
        .sale-off-2 {
            top: 1px;
        }
    }

    /* tablet */
    @media (min-width: 740px) and (max-width: 1023px) {
        .daonguoc {
            display: flex;
            flex-direction: column-reverse;
        }

        #main-img {
            max-width: unset;
        }

        #main-img img {
            width: 100%;
            margin-left: 0;
            margin-top: 0;
            background-size: cover;
            background-position: center;
            margin-bottom: 10px;
        }

        .all-img>li {
            display: inline-block;
        }

        .all-img {
            padding: unset;
        }

        .img-item img {
            width: 150px;
            cursor: pointer;
            margin: 5px 10px;
        }

        textarea {
            width: 100%;
        }

        .btn-comment {
            display: block;
            width: 100%;
            padding: 25px 0 35px 0;
            font-size: small;
        }
    }

    /* mobile */
    @media (max-width: 739px) {
        .daonguoc {
            display: flex;
            flex-direction: column-reverse;
        }

        #main-img img {
            width: 100%;
            margin-left: 0;
            margin-top: 0;
            background-size: cover;
            background-position: center;
            margin-bottom: 10px;
        }

        .all-img>li {
            display: inline-block;
        }

        .all-img {
            padding: unset;
        }

        .img-item img {
            width: 80px;
            margin: 5px 2px;
        }

        .product__price {
            margin: 15px 0;
        }

        .product__wrap {
            display: block;
            margin: 15px 0;
        }

        .add-cart {
            width: 100%;
            padding: 10px 0;
            margin: 15px 0;
        }

        .product__shopnow {
            display: block;
        }

        .shopnow {
            width: 100%;
            margin-bottom: 15px;
        }

        .likenow {
            width: 100%;
        }

        .btn-comment {
            width: 100%;
        }

        .sale-off-2 {
            top: 1px;
        }
    }
</style>
<div class="container">
    <div class="product__detail">
        <div class="row product__detail-row">
            <div class="col-lg-6 col-12 daonguoc">
                <div class="img-product">
                    <ul class="all-img">
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chiTietSp['img'] ?>" class="small-img" alt="anh 1"
                                onclick="changeImg('one')" id="one">
                        </li>
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chiTietSp['img'] ?>" class="small-img" alt="anh 2"
                                onclick="changeImg('two')" id="two">
                        </li>
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chiTietSp['img'] ?>" class="small-img" alt="anh 3"
                                onclick="changeImg('three')" id="three">
                        </li>
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chiTietSp['img'] ?>" class="small-img" alt="anh 4"
                                onclick="changeImg('four')" id="four">
                        </li>

                    </ul>
                </div>
                <div id="main-img" style="cursor: pointer;">
                    <img src="./uploads/upimg/<?= $chiTietSp['img'] ?>" class="big-img" alt="ảnh chính" id="img-main"
                        xoriginal="./uploads/upimg/<?= $chiTietSp['img'] ?>">
                    <!-- <div class="sale-off sale-off-2">
                        <span class="sale-off-percent">20%</span>
                        <span class="sale-off-label">GIẢM</span>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="product__name">
                    <h2><?= $chiTietSp['name'] ?></h2>
                </div>
                <div class="status-product">
                    Trạng thái: <b><?= $chiTietSp['status'] == 0 ? 'Hoạt Động' : 'Không Hoạt Động'; ?></b>
                </div>
                <div class="infor-oder">
                    Loại sản phẩm: <b><?= $categories['name'] ?></b>
                </div>
                <div class="product__price">
                    <h2><?= $chiTietSp['price'] . ' VND' ?></h2>
                </div>
                <!-- <div class="price-old">
                        Giá gốc:
                        <del>650.000đ</del>
                        <span class="discount">(-20%)</span>
                    </div> -->
                <!-- <div class="product__color">
                <div class="select-swap">
                  <div class="circlecheck">
                    <input type="radio" id="f-option" class="circle-1" name="selector" checked>
                    <label for="f-option">Radio Mint Color</label>
                    
                    <div class="outer-circle"></div>
                  </div>
                  <div class="circlecheck">
                    <input type="radio" id="g-option" class="circle-2" name="selector">
                    <label for="g-option">Radio Orange Color</label>
                    
                    <div class="outer-circle"></div>
                  </div>
                  <div class="circlecheck">
                    <input type="radio" id="h-option" class="circle-3" name="selector">
                    <label for="h-option">Radio Purple Color</label>
                    
                    <div class="outer-circle"></div>
                  </div>
                  
                </div>
              </div> -->
                <div class="product__color d-flex" style="align-items: center;">
                    <div class="title" style="font-size: 16px; margin-right: 10px;">
                        Màu:
                    </div>
                    <div class="select-swap">
                        <?php foreach ($listColor as $color) { ?>
                            <div class="form-check form-check-inline">
                                <input
                                    type="radio"
                                    id="option"
                                    class="form-check-input circle-1"
                                    name="selector[]"
                                    value="<?php echo $color['id']; ?>">
                                <label
                                    class="form-check-label"
                                    for="option">
                                    <?php echo $color['name']; ?>
                                </label>
                            </div>
                        <?php } ?>
                        <!-- <div class="circlecheck">
                            <input type="radio" id="g-option" class="circle-2" name="selector">
                            <label for="g-option"></label>
                            <div class="outer-circle"></div>
                        </div>
                        <div class="circlecheck">
                            <input type="radio" id="h-option" class="circle-3" name="selector">
                            <label for="h-option"></label>
                            <div class="outer-circle"></div>
                        </div> -->
                    </div>
                </div>
                <div class="product__size d-flex" style="align-items: center;">
                    <div class="title" style="font-size: 16px; margin-right: 10px;">
                        Kích thước:
                    </div>
                    <div class="select-swap">
                        <?php foreach ($listSize as $size) { ?>
                            <div class="form-check form-check-inline">
                                <input
                                    type="radio"
                                    id="option-<?php echo $size['id']; ?>"
                                    class="form-check-input circle-1"
                                    name="selector"
                                    value="<?php echo $size['id']; ?>">
                                <label
                                    class="form-check-label"
                                    for="option-<?php echo $size['id']; ?>">
                                    <?php echo $size['name']; ?>
                                </label>
                            </div>
                        <?php } ?>

                        <!-- <div class="swatch-element" data-value="39">
                            <input type="radio" class="variant-1" id="swatch-1-39" name="mau" value="thanh"
                                onclick="check()">
                            <label for="swatch-1-39" class="sd"><span>39</span></label>
                        </div>
                        <div class="swatch-element" data-value="40">
                            <input type="radio" class="variant-1" id="swatch-1-40" name="mau" value="hieu"
                                onclick="check()">
                            <label for="swatch-1-40" class="sd"><span>40</span></label>
                        </div> -->
                    </div>
                </div>
                <form action="?act=giohang" method="post">
                    <div class="product__wrap">
                        <div class="product__amount">
                            <label for="">Số lượng: </label>
                            <!-- <input type="button" value="-" class="control" onclick="tru()" id="cong"> -->
                            <input type="number" style="width: 100px" value="1" class="text-input">
                            <!-- <input type="button" value="+" class="control" onclick="cong()"> -->
                        </div>
                        <button class="add-cart">Thêm vào giỏ</button>
                    </div>
                </form>
                <div class="product__shopnow">
                    <button class="shopnow">Mua ngay</button>
                    <span class="home-product-item__like home-product-item__like--liked">
                        <i class="home-product-item__like-icon-empty far fa-heart"
                            style="font-size: 24px;margin-top: 7px;"></i>
                        <i class="home-product-item__like-icon-fill fas fa-heart"
                            style="font-size: 24px;margin-top: 7px;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product__describe">
    <div class="container">
        <h2 class="product__describe-heading">Mô tả</h2>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-11">
                <h3 class="name__product"><?= $chiTietSp['name'] ?></h3>
                <h3><?= $chiTietSp['description'] ?></h3>
                <!-- <p>Phân khúc: Academy (tầm trung).</p> -->
                <!-- <p>Upper: Synthetic - Da tổng hợp cao cấp.</p>
                <p>Thiết kế đinh giày: Các đinh cao su hình chữ nhật, xếp chồng chéo với nhau. Theo đánh giá của nhiều
                    người chơi thì những đinh TF hình chữ nhật lần này giúp đôi giày có thể trụ vững hơn trên sân.</p>
                <p>Độ ôm chân: Cao</p>
                <p>Bộ sưu tập: SAFARI PACK - Ra mắt tháng 4/2021</p>
                <p>PTrên chân các cầu thủ nổi tiếng như: Cristiano Ronaldo, Kylian Mbappé, Erling Haaland, Jadon Sancho,
                    Leroy Sané, Romelu Lukaku...</p> -->
            </div>
        </div>
    </div>
</div>
<div class="product__comment">
    <div class="container">
        <h2 class="product__describe-heading">Bình luận</h2>
        <div class="row">
            <div class="col-lg-4 col-12 mb-4">
                <div class="home-product-item__rating"
                    style="font-size: 24px;transform-origin: left;margin-bottom: 5px">
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <textarea name="" id="" cols="70" rows="10"></textarea>
                <button type="submit" class="btn btn-comment">Gửi</button>
            </div>
            <div class="col-lg-8 col-12">
                <div class="body__comment">
                    <?php foreach ($listComment as $comment) { ?>
                        <div class="comment" style="align-items: center;">
                            <img class="comment-img" src="./views/user/assets/img/product/noavatar.png" alt="">
                            <div class="comment__content">
                                <div class="comment__content-heding">
                                    <h4 class="comment__content-name"><?= $comment['user'] ?></h4>
                                    <span class="comment__content-time"><?= $comment['time_comment'] ?></span>
                                </div>
                                <div class="home-product-item__rating"
                                    style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="comment__content-content">
                                    <span><?= $comment['conten'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <img class="comment-img" src="./views/user/assets/img/product/noavatar.png" alt="">
                            <div class="comment__content">
                                <div class="comment__content-heding">
                                    <h4 class="comment__content-name"><?= $comment['user'] ?></h4>
                                    <span class="comment__content-time"><?= $comment['time_comment'] ?></span>
                                </div>
                                <div class="home-product-item__rating"
                                    style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="comment__content-content">
                                    <span><?= $comment['conten'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <img class="comment-img" src="./views/user/assets/img/product/noavatar.png" alt="">
                            <div class="comment__content">
                                <div class="comment__content-heding">
                                    <h4 class="comment__content-name"><?= $comment['user'] ?></h4>
                                    <span class="comment__content-time"><?= $comment['time_comment'] ?></span>
                                </div>
                                <div class="home-product-item__rating"
                                    style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="comment__content-content">
                                    <span><?= $comment['conten'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <img class="comment-img" src="./views/user/assets/img/product/noavatar.png" alt="">
                            <div class="comment__content">
                                <div class="comment__content-heding">
                                    <h4 class="comment__content-name"><?= $comment['user'] ?></h4>
                                    <span class="comment__content-time"><?= $comment['time_comment'] ?></span>
                                </div>
                                <div class="home-product-item__rating"
                                    style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="comment__content-content">
                                    <span><?= $comment['conten'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <img class="comment-img" src="./views/user/assets/img/product/noavatar.png" alt="">
                            <div class="comment__content">
                                <div class="comment__content-heding">
                                    <h4 class="comment__content-name"><?= $comment['user'] ?></h4>
                                    <span class="comment__content-time"><?= $comment['time_comment'] ?></span>
                                </div>
                                <div class="home-product-item__rating" style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="home-product-item__star--gold fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="comment__content-content">
                                    <span><?= $comment['conten'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end product detail -->
<!-- product relate to -->
<div class="product__relateto">
    <div class="container">
        <h3 class="product__relateto-heading">Sản phẩm liên quan</h3>
        <div class="row">
            <?php foreach ($danhMucLienQuan as $danhMuc) : ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                    <a href="?act=chitietsp" class="product__new-item">
                        <div class="card" style="width: 100%">
                            <div>
                                <img class="card-img-top" src="./uploads/upimg/<?= $danhMuc['img'] ?>" alt="Card image cap">
                                <!-- <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form> -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title custom__name-product">
                                    <?= $chiTietSp['name'] ?>
                                </h5>
                                <div class="product__price">
                                    <!-- <p class="card-text price-color product__price-old">1,000,000 đ</p> -->
                                    <p class="card-text price-color product__price-new"><?= $danhMuc['price'] . ' VND' ?></p>
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
                                    <span class="home-product-item__sold">79 đã bán</span>
                                </div>
                                <!-- <div class="sale-off">
                                <span class="sale-off-percent">20%</span>
                                <span class="sale-off-label">GIẢM</span>
                            </div> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                    <a href="?act=chitietsp" class="product__new-item">
                        <div class="card" style="width: 100%">
                            <div>
                                <img class="card-img-top" src="./uploads/upimg/<?= $danhMuc['img'] ?>" alt="Card image cap">
                                <!-- <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form> -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title custom__name-product">
                                    <?= $chiTietSp['name'] ?>
                                </h5>
                                <div class="product__price">
                                    <!-- <p class="card-text price-color product__price-old">1,000,000 đ</p> -->
                                    <p class="card-text price-color product__price-new"><?= $danhMuc['price'] . ' VND' ?></p>
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
                                    <span class="home-product-item__sold">79 đã bán</span>
                                </div>
                                <!-- <div class="sale-off">
                                <span class="sale-off-percent">20%</span>
                                <span class="sale-off-label">GIẢM</span>
                            </div> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                    <a href="?act=chitietsp" class="product__new-item">
                        <div class="card" style="width: 100%">
                            <div>
                                <img class="card-img-top" src="./uploads/upimg/<?= $danhMuc['img'] ?>" alt="Card image cap">
                                <!-- <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form> -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title custom__name-product">
                                    <?= $chiTietSp['name'] ?>
                                </h5>
                                <div class="product__price">
                                    <!-- <p class="card-text price-color product__price-old">1,000,000 đ</p> -->
                                    <p class="card-text price-color product__price-new"><?= $danhMuc['price'] . ' VND' ?></p>
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
                                    <span class="home-product-item__sold">79 đã bán</span>
                                </div>
                                <!-- <div class="sale-off">
                                <span class="sale-off-percent">20%</span>
                                <span class="sale-off-label">GIẢM</span>
                            </div> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                    <a href="?act=chitietsp" class="product__new-item">
                        <div class="card" style="width: 100%">
                            <div>
                                <img class="card-img-top" src="./uploads/upimg/<?= $danhMuc['img'] ?>" alt="Card image cap">
                                <!-- <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form> -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title custom__name-product">
                                    <?= $chiTietSp['name'] ?>
                                </h5>
                                <div class="product__price">
                                    <!-- <p class="card-text price-color product__price-old">1,000,000 đ</p> -->
                                    <p class="card-text price-color product__price-new"><?= $danhMuc['price'] . ' VND' ?></p>
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
                                    <span class="home-product-item__sold">79 đã bán</span>
                                </div>
                                <!-- <div class="sale-off">
                                <span class="sale-off-percent">20%</span>
                                <span class="sale-off-label">GIẢM</span>
                            </div> -->
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <div class="seemore">
            <a href="./Product.html">Xem thêm</a>
        </div>
    </div>
</div>
<!-- end  product relate to-->


<?php include './views/user/layout/footer.php'; ?>
<script src="./views/user/assets/js/main.js"></script>
<script src="./views/user/assets/js/zoomsl.js"></script>
<script>
    $(document).ready(function() {
        $(".big-img").imagezoomsl({
            zoomrange: [3, 3]

        });
    });
</script>
<script>
    function fadeInModal() {
        $('.alert').fadeIn();
        $('.overlay1').fadeIn();
    }

    function fadeOutModal() {
        $('.alert').fadeOut();
        $('.overlay1').fadeOut();
    }

    function fadeout() {
        $('.overlay1').fadeOut();
        $('.alert').fadeOut();
    }
    setInterval(fadeOutModal, 7000);
</script>