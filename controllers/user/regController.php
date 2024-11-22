<?php 
class RegController{

    public $reg;

    public function __construct(){
        $this->reg = new RegModel();
    }
    public function insert(){
        require_once './views/user/dangky/dangky.php';
    }

    public function nextinsert() {
        if (isset($_POST['addUser'])) {
            $hasError = false;
            
            // Kiểm tra user
            if (empty(trim($_POST['user']))) {
                $_SESSION['user_error'] = 'Không được để trống user';
                $hasError = true;
            } else if (strlen(trim($_POST['user'])) <= 6) {
                $_SESSION['user_error'] = 'User phải lớn hơn 6 ký tự';
                $hasError = true;
            }
            
            // Kiểm tra email
            if (empty(trim($_POST['email']))) {
                $_SESSION['email_error'] = 'Không được để trống email';
                $hasError = true;
            } else if (strlen(trim($_POST['email'])) >= 255) {
                $_SESSION['email_error'] = 'Email không được quá 255 ký tự';
                $hasError = true;
            }
            
            // Kiểm tra password
            if (empty(trim($_POST['password']))) {
                $_SESSION['password_error'] = 'Không được để trống mật khẩu';
                $hasError = true;
            } else if (strlen(trim($_POST['password'])) <= 6) {
                $_SESSION['password_error'] = 'Mật khẩu phải lớn hơn 6 ký tự';
                $hasError = true;
            }
    
            // Kiểm tra số điện thoại
            if (empty(trim($_POST['tel']))) {
                $_SESSION['tel_error'] = 'Không được để trống số điện thoại';
                $hasError = true;
            } else if (strlen(trim($_POST['tel'])) != 10) {
                $_SESSION['tel_error'] = 'Số điện thoại phải đúng 10 số';
                $hasError = true;
            }
    
            // Kiểm tra địa chỉ
            if (empty(trim($_POST['address']))) {
                $_SESSION['address_error'] = 'Không được để trống địa chỉ';
                $hasError = true;
            } else if (strlen(trim($_POST['address'])) >= 255) {
                $_SESSION['address_error'] = 'Địa chỉ không được quá 255 ký tự';
                $hasError = true;
            }
            if (!$hasError) {
                // Insert User
                $this->reg->insertUser(user: $_POST['user'],password: $_POST['password'],
                email: $_POST['email'],address: $_POST['address'],tel: $_POST['tel'] );
               
                unset($_SESSION['value'],$_SESSION['user_error'],
                $_SESSION['email_error'],$_SESSION['password_error'],
                $_SESSION['tel_error'],$_SESSION['address_error']);
                header("Location: ?act=dangnhap");
               
            } else {
                $_SESSION['value'] = $_POST;
                header("Location: ?act=dangky&message=error.");
            }
        } else {
            header("Location: ?act=dangky&message=error.");
        }
    }
    
    


}