
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

    .title-heading {
        margin: 0;
        color: #36424b;
        font-size: 18px;
        font-weight: 500;
        padding: 0;
        margin-top: 0;
        margin-bottom: 10px;
        position: relative;
        text-transform: uppercase;
    }

    .contact-info {
        padding: 0;
    }

    .contact-info li {
        display: table;
        margin-bottom: 7px;
        font-size: 14px;
    }

    .text-contact {
        font-style: italic;
        color: #707e89;
    }
    .mapbox {
        border-top: 1px solid #e8e9f1;
        margin-top: 30px;
        height: 350px;
        overflow: hidden;
        border: 10px solid #e5e5e5;
        border-radius: 3px;
    }
    /* Mobile & tablet  */
    @media (max-width: 1023px) {}

    /* tablet */
    @media (min-width: 740px) and (max-width: 1023px) {

        textarea {
            width: 100%;
        }

    }

    /* mobile */
    @media (max-width: 739px) {}
</style>

<div class="content" style="margin-top: 30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="info-shop">
                        <h3 class="title-heading">Thông tin liên hệ</h3>
                        <ul class="contact-info">
                            <li>P&T SHOP xin hân hạnh phục vụ quý khách với những bộ quần áo phục kiện rất nhiều khách
                                hàng
                                tại Việt Nam ưa thích và chọn lựa.</li>
                           
                            <li class="footer__item">
                                <p><i class="fas fa-search-location footer__item-icon"></i>Hà Nội, Việt Nam</p>
                            </li>
                            <li class="footer__item">
                                <p><i class="fas fa-phone-square-alt footer__item-icon"></i> Phone: <a
                                        href="tel:0123456789">0123456789</a></p>
                            </li>
                            <li class="footer__item">
                                <p><i class="fas fa-envelope-square footer__item-icon"></i> Email: <a
                                        href="mailto:abc@gmail.com">abc@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="page-login">
                        <h3 class="title-heading">Gửi thông tin</h3>
                        <span class="text-contact">Bạn hãy điền nội dung tin nhắn vào form dưới đây
                            và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.
                        </span>
                        <br>
                        <h4 class="text-success"><?php if(isset($_SESSION['success&err'])) echo $_SESSION['success&err']; unset($_SESSION['success&err']) ?></h4>
                        <form action="" method="POST" class="form" id="form-1">
                            <div class="form-group">
                                <label for="fullname" class="form-label">Tên đầy đủ</label>
                                <input id="fullname" name="name" type="text" placeholder="VD: Sơn Đặng"
                                    class="form-control" value="<?php if(isset($_SESSION['account']['user'])) echo $_SESSION['account']['user'] ?? null ?>">
                                <p class="text-danger"><?php if(isset($_SESSION['name_err'])) echo  $_SESSION['name_err']; unset( $_SESSION['name_err']); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="text" placeholder="VD: email@domain.com"
                                    class="form-control"  value="<?php if(isset($_SESSION['account']['user'])) echo $_SESSION['account']['email'] ?? null ?>">
                                    <p class="text-danger"><?php if(isset( $_SESSION['email_err'])) echo   $_SESSION['email_err']; unset(  $_SESSION['email_err']); ?></p>
                                    </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Điện thoại</label>
                                <input id="phone" name="tel" type="tel" placeholder="0912*******"
                                    class="form-control"  value="<?php if(isset($_SESSION['account']['user'])) echo $_SESSION['account']['tel'] ?? null ?>">
                                    <p class="text-danger"><?php if(isset( $_SESSION['tel_err'])) echo   $_SESSION['tel_err']; unset(  $_SESSION['tel_err']); ?></p>
                                </div>
                            <div class="form-group">
                            <label for="phone" class="form-label">Nội dung</label>
                                <p class="text-danger"><?php if(isset($_SESSION['message_err'])) echo  $_SESSION['message_err']; unset( $_SESSION['message_err']); ?></p>
                                <textarea name="message" id="noidung" cols="70" rows="10"></textarea>
                            </div>

                            <button name="submitSenmail" class="form-submit btn-blocker">Gửi tin nhắn<i class="fas fa-arrow-right"
                                    style="font-size: 16px;margin-left: 10px;"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <h3 style="text-align: center; margin-top:30px;border-top:1px solid #333;padding-top:10px">Bản đồ cửa hàng</h3>
                    <div class="mapbox">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863806019075!2d105.74468687471467!3d21.038134787457583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1732871547608!5m2!1svi!2s" width="100%" height="500"  allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include './views/user/layout/footer.php'; ?>