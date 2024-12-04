<?php
$email = 'tuntph46150@fpt.edu.vn';
$emailA = 'pcls313313@gmail.com';
$trangthai = 'đang tìm dữ liệu';
$stk = '4729781';
$bank = 'Acb';
$chutk = "Nguyễn Thành Tú";
$money = $_SESSION['data1']['total_money'];
$formatted_money = number_format($money, 0, '', '');
$formatted_money1 = number_format($money, 0, ',', '.') .' Vnđ';
$magd = "nhom7s" . $_SESSION['data1']['id_order'];
$name = $_SESSION['data1']['name'];
$qr_url_1 = 'https://api.vietqr.io/' . $bank . '/' . $stk . '/' . $formatted_money . '/' . $magd . '/vietqr_net_2.jpg?accountName=' . $name . '';

if (!empty($_SESSION['data_bank'])) {
    $dataBank = $_SESSION['data_bank'];
    $check = false;
    foreach ($dataBank['transactions'] as $transaction) {
        if (strpos($transaction['description'], $magd) !== false) {
            $check = true;
            $trangthai = 'Hoàn thành';
            break;
        }
    }
    if ($check) {
        sleep(6);
        $_SESSION['success'] = 'bạn đã thanh toán thành công ' . $magd . '';
        header("Location: ?act=user/order_history&msg=thanhtoanthanhcong");
    }
    
}
?>


<!DOCTYPE html>

<head id="j_idt2">
</head>
<html xmlns="http://www.w3.org/1999/xhtml">

<head id="CMSNTCO">
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <title>Thanh toán hoá đơn</title>
    <meta name="description" content="Cổng thanh toán CMSNT.CO" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="all,follow" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://sieuxu.com/public/faces/javax.faces.resource/material/css/bootstrap.min.css" />
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://sieuxu.com/public/faces/javax.faces.resource/material/css/style.default.css"
        id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet"
        href="https://sieuxu.com/public/faces/javax.faces.resource/material/css/style-version=1.0.css" />
    <link rel="stylesheet" href="https://sieuxu.com/public/faces/javax.faces.resource/material/css/qr-code.css" />
    <link rel="stylesheet"
        href="https://sieuxu.com/public/faces/javax.faces.resource/material/css/qr-code-tablet.css" />
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Cute Alert -->
    <link class="main-stylesheet" href="https://sieuxu.com/public/cute-alert/style.css" rel="stylesheet"
        type="text/css">

    <style type="text/css">
        .container-fluid {
            width: 40% !important;
            min-width: 750px !important;
        }

        .info-box {
            min-height: 600px;
        }

        .entry {
            border-bottom: 1px solid #424242;
        }

        .left {
            background-color: #262626;
        }

        .receipt {
            border-bottom: 1px solid #424242
        }
    </style>
</head>

<body>
    </div>
    <div id="page" style="display: none;">
        <nav class="navbar navbar-default hidden-xs">
            <div class="container-fluid" style="padding: 1px;padding: 1px;width: 45%;min-width: 800px;">
                <div class="navbar-header" style="position: relative">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right" style="padding-right: 0px;">
                        <img src="https://sieuxu.com/public/faces/javax.faces.resource/images/hotline.svg"
                            alt="logo-security" width="35" />
                        <span></span>
                        <img src="https://sieuxu.com/public/faces/javax.faces.resource/images/email.svg"
                            alt="logo-security" width="35" />
                        <a href="mailto:"><span></span></a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 left">
                    <div class="info-box">
                        <div class="receipt">
                            <img src="" width="100%" />
                        </div>
                        <div class="entry">
                            <p><i class="fa fa-university" aria-hidden="true"></i>
                                <span style="padding-left: 5px;">Ngân Hàng</span>
                                <br />
                                <span style="padding-left: 25px;word-break: keep-all;"><?= $bank ?></span>
                            </p>
                        </div>
                        <div class="entry">
                            <p><i class="fa fa-credit-card" aria-hidden="true"></i>
                                <span style="padding-left: 5px;">Số tài khoản</span>
                                <br />
                                <b id="copyStk"
                                    style="padding-left: 25px;word-break: keep-all;color:greenyellow;"><?= $stk ?></b>
                                <i onclick="copy()" data-clipboard-target="#copyStk" class="fas fa-copy copy"></i>
                            </p>
                        </div>
                        <div class="entry">
                            <p><i class="fa fa-user" aria-hidden="true"></i>
                                <span style="padding-left: 5px;">Chủ tài khoản</span>
                                <br />
                                <span style="padding-left: 25px;word-break: keep-all;"><?= $chutk ?></span>
                            </p>
                        </div>
                        <div class="entry">
                            <p><i class="fa fa-money" aria-hidden="true"></i>
                                <span style="padding-left: 5px;">Số tiền cần thanh toán</span>
                                <br />
                                <b style="padding-left: 25px;color:aqua;">
                                    <?=  $formatted_money1 ?>
                                </b>
                            </p>
                        </div>
                        <div class="entry">
                            <p><i class="fa fa-comment" aria-hidden="true"></i>
                                <span style="padding-left: 5px;">Nội dung chuyển khoản</span>
                                <br />
                                <b id="copyNoiDung"
                                    style="padding-left: 25px;word-break: keep-all;color:yellow;"><?= $magd ?></b>
                                <i onclick="copy()" data-clipboard-target="#copyNoiDung" class="fas fa-copy copy"></i>
                            </p>
                        </div>
                        <div class="entry">
                            <p><i class="fa fa-barcode" aria-hidden="true"></i>
                                <span style="padding-left: 5px;">Trạng thái</span>
                                <br />
                                <span id="status_payment"
                                    style="padding-left: 25px;word-break: break-all;"><?= $trangthai ?>
                                </span>
                            <div id="countdown" style="color: red; font-size: 16px; padding-top: 10px;"></div>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 right">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="message" id="loginForm">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="qr-code">
                                                <div class="payment-cta">
                                                    <div>
                                                        <h1>Quét mã QR để thanh toán</h1>
                                                    </div>
                                                    <a>Sử dụng <b> App Internet Banking </b> hoặc ứng dụng camera hỗ trợ
                                                        QR code để quét mã</a>
                                                </div>
                                                <img src="<?php echo $qr_url_1 ?>" width="100%" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid hidden-xs">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="copyrights text-center">
                        <p style="color: #737373;   font-size: 11pt; font-weight: bold;">
                            <br />
                            Vui lòng thanh toán vào thông tin tài khoản trên để hệ thống xử lý hoá đơn tự động.
                        </p><a href="?act=user/order_history"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            <span>Quay Lại</span></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://sieuxu.com/public/faces/javax.faces.resource/js/momo.js"></script>
    <script type="text/javascript" src="https://sieuxu.com/public/faces/javax.faces.resource/js/ws.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script>
        var transactions = <?php echo json_encode($dataBank['transactions']); ?>;
        transactions.forEach(function (transaction) {
            console.log(transaction);
        });
    </script>
    <script type="text/javascript">
        $(window).load(function () {
            $('#page').show();
            $('#spinner').hide();
            $("img.lazy").show().lazyload();
        });
    </script>
    <script type="text/javascript">
        new ClipboardJS(".copy");

        function copy() {
            cuteToast({
                type: "success",
                message: "Đã sao chép vào bộ nhớ tạm",
                timer: 5000
            });
        }
    </script>
</body>

</html>