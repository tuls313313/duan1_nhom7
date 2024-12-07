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
    public $api;
    public $order;

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
        $this->order = new OrderModel();
        $this->api = new ApiModel();
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
        if (!isset($_SESSION['account']['id'])) {
            $_SESSION['login_err'] = 'Vui lòng đăng nhập để mua hàng.';
            header("Location: ?act=user/dangnhap");
            exit();
        }
        $id_pro = $_GET['id'];
        $userId = $_SESSION['account']['id'];
        $id_size = $_POST['id_size'];
        $id_color = $_POST['id_color'];
        $quantity = intval($_POST['quantity']);
        if (empty($quantity) >= 1) {
            $_SESSION['err_q'] = 'Vui lòng nhập số lượng hợp lệ và lớn hơn 1';
            $err = true;
        }
        $money = intval($_POST['money']);
        $total_money = $quantity * $money;

        $err = false;
        if (empty($id_size)) {
            $_SESSION['err_z'] = 'Vui lòng chọn size';
            $err = true;
        }
        if (empty($id_color)) {
            $_SESSION['err_c'] = 'Vui lòng chọn màu';
            $err = true;
        }

        if ($err) {
            header("Location: ?act=chitietsp&id=$id_pro");
            exit();
        }
        if (isset($_POST['submitAdd'])) {
            $this->cart->addToCart($userId, $total_money, $id_pro, $id_color, $id_size, $quantity, $money);
            header("Location: ?act=giohang");
            exit();
        } else if (isset($_POST['buyNow'])) {
            $id = $_GET['id'];
            $chitietsp = $this->chiTietSp->getOneProduct($id);
            $_SESSION['buyNow1'] = $chitietsp;
            $_SESSION['buyNow'] = [
                'id_pro' => $id_pro,
                'id_size' => $id_size,
                'id_color' => $id_color,
                'quantity' => $quantity,
                'money' => $money,
                'total_money' => $total_money,
            ];
            $data_color = $this->color->getOneColor($_SESSION['buyNow']['id_color']);
            $data_size = $this->size->getOneSize($_SESSION['buyNow']['id_size']);
            require_once './views/user/thanhtoan/thanhtoan.php';
        }
    }

    public function giohang()
    {
        if (isset($_SESSION['account']['id'])) {
            $userId = intval($_SESSION['account']['id']);
            $listCart = $this->cart->getAllDetailCart($userId);
            $_SESSION['list_cart'] = $listCart;
        } else {

        }
        require_once './views/user/giohang/giohang.php';
    }

    public function xoacart()
    {
        $cart_id = $_POST['cart_id'];
        $cart_detail_id = $_POST['cart_detail_id'];
        $quantity = $_POST['quantity'];
        $money = $_POST['cart_detail_money'];
        // var_dump($cart_detail_id, $cart_id, $quantity, $money);
        if (isset($_POST['delete'])) {
            $this->cart->deleteCart($cart_detail_id, $cart_id);
            $_SESSION['success'] = 'Xóa giỏ hàng thành công';
            header('location: ?act=giohang');
            exit();
        } else if (isset($_POST['cong'])) {
            $this->cart->congCartDetails($cart_detail_id, $cart_id, $quantity, $money);
            header('location: ?act=giohang');
        } else if (isset($_POST['tru'])) {
            if ($quantity > 1) {
                $this->cart->truCartDetails($cart_detail_id, $cart_id, $quantity, $money);
                header('location: ?act=giohang');
                exit();
            } else {
                $_SESSION['err_qua'] = 'Số lượng không được nhỏ hơn 1';
                header('location: ?act=giohang');
                exit();
            }
        }
        
    }

    public function thanhtoan(){
        $user_id = $_SESSION['account']['id'];
        $id_promotion = "null";
        $name = $_POST['hoten'];
        $address = $_POST['diachi'];
        $tel = $_POST['sdt'];
        $payment = $_POST['payment'];
        $_SESSION['payment'] = $payment;
        if($payment == 1){
            if(!empty($_SESSION['data1'])){
                header("Location: ?act=user/order_history");
                $_SESSION['err_data1'] = 'Bạn có đơn hàng chưa thanh toán vui lòng thanh toán trước khi mua đơn mới';
                exit();
            }
        }
        $total_amount = $_SESSION['buyNow']['quantity'];
        $product_id = $_SESSION['buyNow']['id_pro'];
        $id_var =  $_SESSION['chitietspone']['variant_id'];
        $id_color = $_SESSION['buyNow']['id_size'];
        $id_size = $_SESSION['buyNow']['id_color'];
        $quantity = $_SESSION['buyNow']['quantity'];
        $price = $_SESSION['buyNow']['money'];
        $total_money = intval($quantity * $price);
        // var_dump($_SESSION['buyNow']);
        if (isset($_POST['submit'])) {
            $id_order = $this->order->insertOrder(
                $user_id,$id_promotion,$name,$tel,$address,
                $payment,$total_amount,$total_money,$product_id,
                $id_color,$id_size,$quantity,$price, $id_var
            );
            $data = $this->order->getOneOrder_detail($id_order);
            $data1 = $this->order->getOneOrder($data['order_id']);
            $_SESSION['data'] = $data;
            $_SESSION['data1'] = $data1;
            $magd = $_SESSION['data1']['id_order'];
            if ($payment == 0) {
                $_SESSION['success'] = 'Bạn đã mua hàng thành công';
                header("Location: ?act=user/order_history");
            } else {
                header("Location: ?act=user/orderOnl&id=$magd");

            }
        }
    }

    public function ttgiohang()
    {
        // echo '<pre>';
        // var_dump($_SESSION['list_cart']);
        // echo '</pre>';
        require_once './views/user/thanhtoan/thanhtoangiohang.php';
    }

    public function next_tt_giohang()
    {
        
        $err = false;
        $user_id = $_SESSION['account']['id'];
        $id_promotion = "null";
        $name = $_POST['hoten'];
        $address = $_POST['diachi'];
        $tel = $_POST['sdt'];
        $payment = $_POST['payment'];
        if($payment == 1){
            if(!empty($_SESSION['data1'])){
                header("Location: ?act=user/order_history");
                $_SESSION['err_data1'] = 'Bạn có đơn hàng chưa thanh toán vui lòng thanh toán trước khi mua đơn mới';
                exit();
            }
        }
        $total_amount = $_POST['total_amount'];
        $total_money = $_POST['total_money'];
        $cart_id = $_POST['cart_id'];
        if (empty($cart_id)) {
            header("Location: ?act=product");
        }
        $cart_id_str = implode(',', $cart_id);
        if (isset($_POST['submit'])) {
            $this->order->insertGioHang(
                $user_id,
                $id_promotion,
                $name,
                $tel,
                $address,
                $payment,
                $total_amount,
                $total_money,
                $cart_id_str
            );
            unset($_SESSION['list_cart']);
            $id_o = $_SESSION['id_o'];
            $data = $this->order->getOneOrder_detail($id_o);
            $data1 = $this->order->getOneOrder($id_o);
            // var_dump( $data);
            $_SESSION['data'] = $data;
            $_SESSION['data1'] = $data1;
            $magd = $_SESSION['data1']['id_order'];
            if ($payment == 0) {
                $_SESSION['success'] = 'Bạn đã mua hàng thành công';
                header("Location: ?act=user/order_history");
            } else {
                header("Location: ?act=user/orderOnl&id=$magd");
            }
        }
    }

    public function thanhtoanonl()
    {
        require_once './views/user/thanhtoan/thanhtoanonl.php';
    }

    public function get_tt_onl()
    {
        $password = 'Tu31304';
        $accountNumber = '472971';
        $token = '5972E99F-D6F9-6104-104038B2FDB6';
        $data = $this->api->fetchTransaction($password, $accountNumber, $token);
        $_SESSION['data_bank'] = $data;
        echo '<pre>';
        print_r($data);
        echo '<pre>';
        if (!empty($_SESSION['data_bank'])) {
            $dataBank = $_SESSION['data_bank'];
            $check = false;
            if(isset($_SESSION['data1']['id_order'])){
                $magd = $_SESSION['data1']['id_order'];
            }
           
           if(isset($magd ))
            foreach ($dataBank['transactions'] as $transaction) {
                if (strpos($transaction['description'], $magd) !== false) {
                    $check = true;
                    break;
                }
            }
            if ($check) {
                $id = $_SESSION['id_tran'];
                $this->api->update($id);
                unset($_SESSION['data'],$_SESSION['data1']);
            }
        }
    }

    public function chitietsp()
    {
        $productId = $_GET['id'];
        $chitietspall = $this->chiTietSp->getAllProductDetails($productId);
        $chitietspone = $this->chiTietSp->getOneProductDetails($productId);
        $danhMucLienQuan = $this->chiTietSp->getAllProductsByCategory($productId);
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

    public function search_product()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['search']) && !empty(trim($_POST['search']))) {
                $keyword = trim($_POST['search']);
                $datasp = $this->chiTietSp->searchProducts($keyword);
                // var_dump($datasp);
                require_once './views/user/product/product.php';
                // header("Location: ?act=product");
            } else {
                require_once './views/user/product/product.php';
                $_SESSION['err_search'] = 'Không tìm thấy sản phẩm nào có tên như vậy!';
            }
        } else {
            require_once './views/user/product/product.php';
            $_SESSION['err_search'] = 'Không có sản phẩm nào!';
        }

    }
}
