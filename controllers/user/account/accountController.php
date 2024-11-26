<?php
class AccountController
{
    public $account;

    public function __construct()
    {
        $this->account = new UserModels();
    }
    public function insert()
    {
        require_once './views/user/dangky/dangky.php';
    }

    public function nextinsert()
    {
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
                $this->account->insertUser(
                    user: $_POST['user'],
                    password: $_POST['password'],
                    email: $_POST['email'],
                    address: $_POST['address'],
                    tel: $_POST['tel']
                );

                unset(
                    $_SESSION['value'],
                    $_SESSION['user_error'],
                    $_SESSION['email_error'],
                    $_SESSION['password_error'],
                    $_SESSION['tel_error'],
                    $_SESSION['address_error']
                );
                header("Location: ?act=dangnhap");

            } else {
                $_SESSION['value'] = $_POST;
                header("Location: ?act=user/dangky&message=error.");
            }
        } else {
            header("Location: ?act=user/dangky&message=error.");
        }
    }

    public function dangnhap()
    {
        require_once './views/user/dangnhap/dangnhap.php';
    }

    public function nextDangNhap()
    {
        if (isset($_POST['submit'])) {
            $err = false;
            
            if (empty(trim($_POST['email']))) {
                $_SESSION['email_err'] = 'Vui lòng nhập email';
                $err = true;
            }
    
            if (empty(trim($_POST['password']))) {
                $_SESSION['password_err'] = 'Vui lòng nhập mật khẩu';
                $err = true;
            }
    
            if (!$err) {
                $checkacc = $this->account->checklogin($_POST['email'], $_POST['password']);
                if ($checkacc) {
                    $_SESSION['account'] = $checkacc;
                    if($_SESSION['account']['status'] == 1) {
                        $_SESSION['login_err'] = 'Tài khoản của bạn đã bị khóa vui lòng liên hệ admin để biết thêm chi tiết';
                        unset($_SESSION['account']); 
                        header('location: ?act=user/dangnhap&msg=err');
                    }else{
                        header('location: ?act=trangchu&msg=success');
                    }
                } else {
                    $_SESSION['login_err'] = 'Thông tin đăng nhập không đúng';
                    header('location: ?act=user/dangnhap&msg=err');
                    exit;
                }
                
            } else {
                header('location: ?act=user/dangnhap&msg=err');
            }
        } else {
            header('location: ?act=user/dangnhap&msg=err');
        }
    }
    
    public function dangxuat()
    {
        session_unset();
        header('location: ?act=trangchu');
    }

    public function edit(){
        $id = $_SESSION['account']['id'];
        $data =  $this->account->getOneUser($id);
        require_once './views/user/account/account.php';
    }
    public function nextEdit(){
        if(empty($_POST['submit'])){
            $err  = false;
            $id = $_SESSION['account']['id'];
            if (empty(trim($_POST['password']))) {
                $_SESSION['password'] = 'Không được để trống mật khẩu';
                $err = true;
            } else if (strlen(trim($_POST['password'])) <= 6) { 
                $_SESSION['password'] = 'Mật khẩu phải lớn hơn 6 ký tự';
                $err = true;
            }
            if(!$err){
                $this->account->editUser1( id: $id,password: $_POST['password']);
                header("location: ?act=user/dangxuat&msg=success");
            }
            else{
                header("location:  ?act=user/edit&msg=err");
            }
        }  
      
    }

    public function quenmk(){
        require_once './views/user/dangnhap/quenmatkhau.php';    
    }

    public function changeQuenMk(){
        if(isset($_POST['submit'])){ 
            $email = $_POST['email'];
            $data = $this->account->changeQuenMk($email);  
            require_once './views/user/dangnhap/quenmatkhau.php';          
        }
    }
    
    
}