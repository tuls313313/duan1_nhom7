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

    .home-product-item__rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-start;
        font-size: 24px;
        transform-origin: left;
        margin-bottom: 5px;
    }

    .home-product-item__rating input {
        display: none;
    }

    .home-product-item__rating label {
        color: #ccc;
        cursor: pointer;
    }

    .home-product-item__rating input:checked~label,
    .home-product-item__rating label:hover,
    .home-product-item__rating label:hover~label {
        color: #ffcc00;
        /* Màu vàng của sao */
    }
</style>
<div class="container">
    <div class="product__detail">
        <div class="row product__detail-row">
            <div class="col-lg-6 col-12 daonguoc">
                <div class="img-product">
                    <ul class="all-img">
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chitietsp['product_image']; ?>" class="small-img" alt="anh 1"
                                onclick="changeImg('one')" id="one">
                        </li>
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chitietsp['product_image'] ?>" class="small-img" alt="anh 2"
                                onclick="changeImg('two')" id="two">
                        </li>
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chitietsp['product_image'] ?>" class="small-img" alt="anh 3"
                                onclick="changeImg('three')" id="three">
                        </li>
                        <li class="img-item">
                            <img src="./uploads/upimg/<?= $chitietsp['product_image'] ?>" class="small-img" alt="anh 4"
                                onclick="changeImg('four')" id="four">
                        </li>

                    </ul>
                </div>
                <div id="main-img" style="cursor: pointer;">
                    <img src="./uploads/upimg/<?= $chitietsp['product_image'] ?>" class="big-img" alt="ảnh chính" id="img-main"
                        xoriginal="./uploads/upimg/<?= $chitietsp['product_image'] ?>">
                    <!-- <div class="sale-off sale-off-2">
                        <span class="sale-off-percent">20%</span>
                        <span class="sale-off-label">GIẢM</span>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="product__name">
                    <h2><?= $chitietsp['product_name'] ?></h2>
                </div>
                <div class="status-product">
                    Trạng thái: <b><?= $chitietsp['product_status'] >= 0 ? 'Hoạt Động' : 'Không Hoạt Động'; ?></b>
                </div>
                <div class="infor-oder">
                    Loại sản phẩm: <b><?= $chitietsp['category_name'] ?></b>
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


                <form action="?act=themgiohang&id=<?= $chitietsp['product_id'] ?>" method="post">
                    <div class="product__price">
                        <h2>
                            <input type="text" name="money" value="<?php echo number_format($chitietsp['product_price'] ?? 0, 0, ',', '.') . ' VNĐ' ?>" readonly>
                        </h2>
                        
                        <!-- <h2></h2> -->
                    </div>
                    <div class="product__color d-flex" style="align-items: center;">
                        <div class="title" style="font-size: 16px; margin-right: 10px;">
                            Màu:
                        </div>
                        <div class="select-swap">
                            <?php foreach ($listColor as $color) { ?>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="option" class="form-check-input circle-1" name="id_color"
                                        value="<?php echo $color['color_id']; ?>">
                                    <label class="form-check-label" for="option">
                                        <?php echo $color['color_name']; ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <h5 class="text-danger"><?php if(isset($_SESSION['err_c'])) echo $_SESSION['err_c']; unset($_SESSION['err_c'] ); ?></h5>
                    <div class="product__size d-flex" style="align-items: center;">
                        <div class="title" style="font-size: 16px; margin-right: 10px;">
                            Kích thước:
                        </div>
                        <div class="select-swap">
                            <?php foreach ($listSize as $size) { ?>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="option-<?php echo $size['size_id']; ?>" class="form-check-input circle-1"
                                        name="id_size" value="<?php echo $size['size_id']; ?>">
                                    <label class="form-check-label" for="option-<?php echo $size['size_id']; ?>">
                                        <?php echo $size['size_name']; ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <h5 class="text-danger"><?php if(isset($_SESSION['err_z'])) echo $_SESSION['err_z']; unset($_SESSION['err_z'] ); ?></h5>

                    <div class="product__wrap">
                        <div class="product__amount">
                            <label for="">Số lượng: </label>
                            <input type="number" style="width: 100px" value="1" class="text-input" name="quantity">
                        </div>
                        <button class="add-cart" name="submit">Thêm vào giỏ</button>
                    </div>
                </form>
                <div class="product__shopnow">
                    <a href="?act=thanhtoan&id=<?= $chitietsp['product_id']; ?>"><button class="shopnow">Mua ngay</button></a>

                    <!-- <span class="home-product-item__like home-product-item__like--liked">
                        <i class="home-product-item__like-icon-empty far fa-heart"
                            style="font-size: 24px;margin-top: 7px;"></i>
                        <i class="home-product-item__like-icon-fill fas fa-heart"
                            style="font-size: 24px;margin-top: 7px;"></i>
                    </span> -->
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
                <h3 class="name__product"><?= $chitietsp['product_name'] ?></h3>
                <p><?= nl2br($chitietsp['product_description'])  ?></p>
            </div>
        </div>
    </div>
</div>
<div class="product__comment">
    <div class="container">
        <h2 class="product__describe-heading text-center mb-5">Bình luận</h2>
        <div class="row">
            <!-- Form bình luận -->
            <div class="col-lg-4 col-12 mb-4">
                <form action="?act=user/comment/add&id=<?= $chiTietSp['id'] ?>" method="post"
                    class="p-3 border rounded shadow-sm">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Đánh giá:</label>
                        <div class="home-product-item__rating d-flex justify-content-center align-items-center">
                            <input type="radio" id="star5" name="rating" value="5" checked>
                            <label for="star5" class="fas fa-star me-1"></label>

                            <input type="radio" id="star4" name="rating" value="4">
                            <label for="star4" class="fas fa-star me-1"></label>

                            <input type="radio" id="star3" name="rating" value="3">
                            <label for="star3" class="fas fa-star me-1"></label>

                            <input type="radio" id="star2" name="rating" value="2">
                            <label for="star2" class="fas fa-star me-1"></label>

                            <input type="radio" id="star1" name="rating" value="1">
                            <label for="star1" class="fas fa-star"></label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="conten" class="form-label fw-bold">Nội dung:</label>
                        <h3 class="text-success">
                            <?php if (isset($_SESSION['success']))
                                echo $_SESSION['success'];
                            unset($_SESSION['success']); ?></h3>
                        <h3 class="text-danger"><?php if (isset($_SESSION['error']))
                                                    echo $_SESSION['error'];
                                                unset($_SESSION['error']); ?></h3>
                        <textarea name="conten" id="conten" cols="30" rows="5" class="form-control" placeholder="Viết bình luận của bạn..."></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100 p-3">
                        <h3>Gửi bình luận</h3>
                    </button>
                </form>
            </div>

            <div class="col-lg-8 col-12">
                <div class="comment-section p-4 border rounded shadow-sm">
                    <?php if (!empty($listComment)) { ?>
                        <?php foreach ($listComment as $comment) { ?>
                            <div class="comment d-flex align-items-start mb-4 p-3 border-bottom">
                                <div class="comment-avatar me-3">
                                    <img src="./views/user/assets/img/product/noavatar.png" alt="Avatar" style="width: 40px; height: 40px;">
                                </div>
                                <div class="comment-content">
                                    <div class="ml-3">
                                        <h5 class="comment-author fw-bold mb-2"><?= $comment['user'] ?></h5>
                                        <h5 class="comment-author fw-bold   mt-2"><?= $comment['time_comment'] ?></h5>
                                    </div>
                                    <div class="comment-rating mb-2 ml-3" style="font-size: 20px;">
                                        <?php
                                        $rating = $comment['rating'];
                                        for ($i = 0; $i < $rating; $i++) {
                                            echo "<i class='fas fa-star text-warning'></i>";
                                        }
                                        ?>
                                    </div>
                                    <h5 class="comment-text ml-3"><?= ($comment['conten']) ?></h5>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <h4 class="text-muted">Chưa có bình luận nào. Hãy là người đầu tiên bình luận!</h4>
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
            <?php foreach ($danhMucLienQuan as $danhMuc): ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                    <a href="?act=chitietsp&id=<?= $danhMuc['product_id'] ?>" class="product__new-item">
                        <div class="card" style="width: 100%">
                            <div>
                                <img class="card-img-top" src="./uploads/upimg/<?= $danhMuc['product_image'] ?>" alt="Card image cap">
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
                                    <?= $danhMuc['product_name'] ?>
                                </h5>
                                <div class="product__price">
                                    <!-- <p class="card-text price-color product__price-old">1,000,000 đ</p> -->
                                    <p class="card-text price-color product__price-new"><?php echo number_format($danhMuc['product_price'] ?? 0, 0, ',', '.') . ' VNĐ' ?></p>
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
            <a href="#">Xem thêm</a>
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