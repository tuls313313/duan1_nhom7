<?php
class HomeAdminController
{

    public $user;

    public function __construct()
    {
        $this->user = new UserModels();
    }
    public function UserAdmin()
    {
        $dataUser = $this->user->getAllUser();
        // if ($dataUser) {
        require_once './views/admin/user/user.php';
        // }
        // var_dump(value: $data);
    }

    public function insertUser()
    {
        
        if (isset($_POST['addUser'])) {
            $error = [];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date('Y-m-d H:i:s');

            // Lấy các thông tin từ biểu mẫu
            $user = $_POST['user'];
            if (empty($user)) {
                $error[] = 'Lỗi: tên người dùng rỗng';
            }

            $password = $_POST['password'];
            if (empty($password)) {
                $error[] = 'Lỗi: mật khẩu rỗng';
            }

            $email = $_POST['email'];
            if (empty($email)) {
                $error[] = 'Lỗi: email rỗng';
            }

            $address = $_POST['address'];
            if (empty($address)) {
                $error[] = 'Lỗi: địa chỉ rỗng';
            }

            $tel = $_POST['tel'];
            if (empty($tel) || strlen($tel) > 10) {
                $error[] = 'Lỗi: số điện thoại không hợp lệ';
            }

            // Lấy địa chỉ IP của người dùng
            $ip_address = $this->getUserIP();
            $create_at = $time;
           
            
            if (empty($error)) {
                $this->user->insertUser($user, $password, $email, $address, $tel, $create_at, $ip_address);
                header("Location: ?act=admin/user&message=success!");
            } else {
                header("Location: ?act=admin/user&message=error.");
            }
        } else {
            header("Location: ?act=admin/user&message=error.");
        }
    }

    // Hàm lấy địa chỉ IP của người dùng
    public function getUserIP()
    {
        // Kiểm tra IP từ HTTP_CLIENT_IP (dùng khi có proxy)
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        // Kiểm tra IP từ HTTP_X_FORWARDED_FOR (dùng khi có nhiều proxy)
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // HTTP_X_FORWARDED_FOR có thể chứa nhiều IP, lấy IP công cộng đầu tiên
            $ipArray = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim(end($ipArray)); // Lấy IP cuối cùng nếu có nhiều IP
        }
        // Nếu không có proxy, lấy IP từ REMOTE_ADDR
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // Trả về 127.0.0.1 nếu là localhost, hoặc trả về IP thật nếu không
        return ($ip === '::1') ? '127.0.0.1' : $ip;
    }



    public function editUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataOneUser = $this->user->getOneUser($id);
            require_once './views/admin/user/editUser.php';
        }
    }
    public function nextedit()
    {
        if (isset($_POST['editUser'])) {
            $error = [];
            $id = $_GET['id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date('Y-m-d H:i:s');
            $user = $_POST['user'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            if (strlen(empty($tel)) > 10) {
                $error[] = ' loi tel';
            } else if (strlen($tel) > 10) {
                $error[] = ' loi tel';
            }
            $update_at = $time;
            if (empty($error)) {
                $this->user->editUser($id, $user, $password, $email, $address, $tel, $update_at,$_POST['role'],$_POST['status']);
                header("Location: ?act=admin/user&message=success");
            } else {
                header("Location: ?act=admin/user&message=error");
            }
        } else {
            header("Location: ?act=admin/user&message=error.");
        }
    }

    public function DeletetUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataOneUser = $this->user->deleteUser($id);
            header("Location: ?act=admin/user&message=success");
        }
    }



}