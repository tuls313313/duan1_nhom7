<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class HomeController
{
    public $email = 'tuntph46150@fpt.edu.vn';
    public $emailA = 'pcls313313@gmail.com';
    public $home;
    public $chiTietSp;
    public $categories;
    public $color;
    public $size;
    public $cart;
    public $comment;
    public $user;

    public function __construct()
    {
        $this->home = new ProductModel();
        $this->chiTietSp = new ProductModel();
        $this->color = new ColorModel();
        $this->size = new SizeModel();
        $this->cart = new CartModel();
        $this->comment = new CommentModel();
        $this->categories = new CategoriesModel();
        $this->user = new userModels();
    }
    public function home()
    {
        $datahome = $this->home->getAllProductHome();
        $dataviews = $this->home->getAllProductHomeViews();
        require_once './views/user/home/home.php';
    }

    public function homeIntro()
    {
        require_once './views/user/intro/intro.php';
    }

    public function homeNew()
    {
        require_once './views/user/news/news.php';
    }

    public function lienhe()
    {
        if (isset($_POST['submitSenmail'])) {
            $err = false;
            $name = $_POST['name'];
            if (empty($name)) {
                $_SESSION['name_err'] = 'Vui lòng điền tên';
                $err = true;
            }
            $email = $_POST['email'];
            if (empty($email)) {
                $_SESSION['email_err'] = 'Vui lòng điền email';
                $err = true;
            }
            $tel = $_POST['tel'];
            if (empty($tel)) {
                $_SESSION['tel_err'] = 'Vui lòng điền số điện thoại';
                $err = true;
            }
            $message = $_POST['message'];
            if (empty($message)) {
                $_SESSION['message_err'] = 'Vui lòng Nhập nội dung';
                $err = true;
            }
            if (!$err) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = $this->email;
                    $mail->Password = 'juyzncaekhnnkxzz';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom($this->email, 'nhom_7');
                    $mail->addAddress($this->emailA);
                    $mail->isHTML(true);
                    $mail->Subject = 'Thông báo Liên hệ ' . $tel . '';
                    $mail->Body = 'Tài khoản: ' . $name . ' Vừa gửi thông tin liên hệ: 
                                      <br>Email: ' . $email . '
                                      <br>phone: ' . $tel . '
                                      <br>Nội dung: ' . $message . '
                                      <br>
                                      <br>Vui lòng không chia sẻ thông tin này với bất kỳ ai. <hr>
                                      <p><strong>Thông tin liên hệ:</strong><br>
                                      Nhóm 7<br>
                                      Email: <a href="mailto:' . $this->email . '">' . $this->email . '</a><br>
                                      Tel: +84 123 456 789 </p>
                                      <p><small>&copy; 2024 Nhóm 7. Tất cả các thông tin đều được bảo mật.</small></p>';
                    $mail->send();
                    $_SESSION['success&err'] = 'Bạn đã gửi thông tin thành công,chúng tôi sẽ liên hệ với bạn sớm nhất, xin cảm ơn.';
                    header("Location: ?act=lienhe&msg=success");
                    exit();
                } catch (Exception) {
                    // error_log($mail->ErrorInfo,  3,'errors.log');
                    $_SESSION['success&err'] = "Không thể gửi email. Lỗi: " . $mail->ErrorInfo;
                    header("Location: ?act=lienhe&msg=err");
                    exit();
                }
            }
        }
        require_once './views/user/lienhe/lienhe.php';
    }
    public function themgiohang()
    {
        if (isset($_POST['submit'])) {
            $userId = $_SESSION['account']['id'];
            $id_pro = $_GET['id'];
            $id_cart = $_GET['id'];
            $id_size = $_POST['id_size'];
            $id_color = $_POST['id_color'];
            // var_dump($id_color, $id_size );die();
            $quantity = intval($_POST['quantity']);
            $money = intval($_POST['money']);
            $listCart = $this->cart->addToCart($userId, $id_cart,$id_pro,$id_color,$id_size,$quantity,$money);
            // header("location: ?act=chitietsp&id=$productId");
            header("location: ?act=giohang");
        }
    }
    public function giohang()
    {
        if (isset($_SESSION['account']['id'])) {
            // var_dump($categories);die;
            $userId = intval($_SESSION['account']['id']);
            $listCart = $this->cart->getAllDetailCart($userId);
        }
        require_once './views/user/giohang/giohang.php';
    }
    public function thanhtoan()
    {
        if (!isset($_SESSION['account']['id'])) {
            $_SESSION['login_err'] = 'Vui lòng đăng nhập để mua hàng.';
            header("Location: ?act=user/dangnhap");
            exit();
        }
        require_once './views/user/thanhtoan/thanhtoan.php';
    }


    public function chitietsp()
    {
        $productId = $_GET['id'];
        // var_dump($id);die;
        $chitietsp = $this->chiTietSp->getProductDetails($productId);
        // var_dump($chitietsp);die;
        $danhMucLienQuan = $this->chiTietSp->getAllProductsByCategory($productId);
        // // var_dump($danhMucLienQuan);die;
        $listColor = $this->color->getColorDetails();
        // // var_dump($listColor);die;
        $listSize = $this->size->getSizeDetails();
        $listComment = $this->comment->commentProduct($productId);
        $congView = $this->home->congView($productId);
        require_once './views/user/chitietsp/chitietsp.php';
    }

    public function addCmt()
    {
        if (!isset($_SESSION['account']['id'])) {
            $_SESSION['login_err'] = 'Vui lòng đăng nhập để bình luận.';
            header("Location: ?act=user/dangnhap");
            exit();
        }

        if (isset($_POST['submit'])) {
            $err = false;
            $id_user = $_SESSION['account']['id'];
            $id_pro = $_GET['id'];
            $conten = trim($_POST['conten']);
            $rating = intval($_POST['rating']);

            if (empty($conten)) {
                $err = true;
                $_SESSION['error'] = 'Nội dung bình luận không được để trống.';
            }
            if ($rating < 1 || $rating > 5) {
                $err = true;
                $_SESSION['error'] = 'Số sao không hợp lệ.';
            }

            if (!$err) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = $this->email;
                    $mail->Password = 'juyzncaekhnnkxzz';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom($this->email, 'nhom_7');
                    $mail->addAddress($this->emailA);
                    $mail->isHTML(true);
                    $mail->Subject = 'Thông báo duyệt bình luận';
                    $mail->Body = 'Tài khoản: ' . $_SESSION['account']['user'] . ' <br> Vừa bình luận với nội dung: ' . $conten .
                        '<br><br>Vui lòng không chia sẻ thông tin này với bất kỳ ai. <hr>
                                  <p><strong>Thông tin liên hệ:</strong><br>
                                  Nhóm 7<br>
                                  Email: <a href="mailto:' . $this->email . '">' . $this->email . '</a><br>
                                  Tel: +84 123 456 789 </p>
                                  <p><small>&copy; 2024 Nhóm 7. Tất cả các thông tin đều được bảo mật.</small></p>';
                    $mail->send();
                    $this->comment->addCmt($id_user, $id_pro, $conten, $rating);
                    $_SESSION['success'] = 'Bạn đã bình luận thành công';
                    header("Location: ?act=chitietsp&id=$id_pro&status=success");
                    exit();
                } catch (Exception) {
                    // error_log($mail->ErrorInfo,  3,'errors.log');
                    $_SESSION['error'] = "Không thể gửi email. Lỗi: " . $mail->ErrorInfo;
                    header("Location: ?act=chitietsp&id=$id_pro");
                    exit();
                }
            } else {
                header("Location: ?act=chitietsp&id=$id_pro");
                exit();
            }
        }
    }

    public function product()
    {
        $listSize = $this->size->getAllSize();
        $datasp = $this->chiTietSp->getAllProductStatus();
        $data_cate = $this->categories->getAllCategory();
        require_once './views/user/product/product.php';
    }
}
