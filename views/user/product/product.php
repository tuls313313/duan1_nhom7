<?php include './views/user/layout/header.php'; ?>

<!-- <?php include './views/user/layout/slider.php'; ?> -->
<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 hidden-xs hidden-sm">
                <div class="product__filter">
                    <div class="product__filter-trademark">
                        <h4 class="product__filter-heading">Thương hiệu</h4>
                        <ul id="thuonghieu" class="product__filter-ckeckbox">
                            <?php if(isset($data_cate)) foreach ($data_cate as $cate) {?>
                                <li class="product__filter-item">
                                    <input type="checkbox" class="form-check-input checkthuonghieu"
                                        id="th<?= $cate['id'] ?? null ?>" name="option2"
                                        value="<?= $cate['name'] ?? null ?>">
                                    <label class="form-check-label ml-4"
                                        for="th<?= $cate['id'] ?? null ?>"><?= $cate['name'] ?? null ?> </label>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="product__filter-size">
                        <h4 class="product__filter-heading">Size</h4>
                        <ul id="size" class="product__filter-ckeckbox">
                            <?php if(isset($listSize)) foreach ($listSize as $size) {
                                if ($size['status'] != 1) { ?>
                                    <li class="product__filter-item">
                                        <label class="form-check-label" for="size">
                                            <input type="checkbox" class="form-check-input checksize" id="size" name="option2"
                                                value="<?= $size['id'] ?? null ?>">
                                            <span><?= $size['name'] ?? null ?></span>
                                        </label>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="sort-wrap row">
                    <div class="sort-left col-12 col-lg-6">
                        <h1 class="coll-name">Tất cả sản phẩm</h1>
                    </div>
                    
                    <div class="sort-right col-12 col-lg-6">
                        <div class="sortby">
                            <label for="">Sắp xếp theo:</label>
                            <div class="dropdown">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                                    Sản phẩm nổi bật
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="sort1">Giá: Tăng dần</a>
                                    <a class="dropdown-item" id="sort2">Giá: giảm dần</a>
                                    <a class="dropdown-item" id="sort5">Cũ nhất</a>
                                    <a class="dropdown-item" id="sort6">Mới nhất</a>
                                </div>
                            </div>
                        </div>
                        <div class="sortby2 hidden" style="float: right;">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" id="filter">
                                    Lọc sản phẩm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-danger"><?php if (isset($_SESSION['err_search'])) echo $_SESSION['err_search']; unset($_SESSION['err_search']); ?></h3>
                <div class="loadmore row">
                    <!-- <?php var_dump($datasp) ?> -->
                    <?php if(isset($datasp)) foreach ($datasp as $value) { ?>
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <a href="?act=chitietsp&id=<?= $value['id']; ?>" class="product__new-item">
                                <div class="card h-100">
                                    <div>
                                        <img class="card-img-top" src="./uploads/upimg/<?= $value['img'] ?>"
                                            alt="Card image cap">
                                        <form action="" class="hover-icon">
                                            <input type="hidden">
                                            <a href="?act=thanhtoan&id=<?= $value['id']; ?>" class="btn-add-to-cart"
                                                title="Mua ngay">
                                                <i class="fas fa-cart-plus"></i>
                                            </a>
                                            <a href="?act=chitietsp&id=<?= $value['id']; ?>" class="btn-add-to-cart"
                                                title="Xem nhanh">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title custom__name-product"><?= $value['name'] ?>
                                        </h5>
                                        <div class="product__price">
                                            <p class="card-text price-color product__price-new">
                                                <?= number_format($value['price'], 0, ',', '.') . ' vn₫'; ?>
                                            </p>
                                        </div>
                                        <div class="home-product-item__action">
                                            <span class="home-product-item__like home-product-item__like--liked">
                                                <!-- <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                                <i class="home-product-item__like-icon-fill fas fa-heart"></i> -->
                                            </span>
                                            <span class="home-product-item__sold"><?= $value['sold_quantity'] ?? 0 ?> đã
                                                bán</span>
                                        </div>
                                    </div>
                                    <!-- <div class="sale-off">
                                        <span class="sale-off-percent">20%</span>
                        <span class="sale-off-label">GIẢM</span>
                                    </div> -->
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include './views/user/layout/footer.php'; ?>