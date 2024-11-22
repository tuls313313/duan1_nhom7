<?php
class HomeAdminController
{

    public $user;

    public function __construct()
    {
        $this->user = new UserModels();
    }
    public function ListUser()
    {
        $dataUser = $this->user->getAllUser();
        // if ($dataUser) {
        require_once './views/admin/user/list.php';
        // }
        // var_dump(value: $data);
    }
    
    public function insertUser()
    {
        require_once './views/admin/user/add.php';
    }

    public function nextInsertUser(){
        if (isset($_POST['addUser'])) {
            $error = [];
            if (empty(trim($_POST['user']))) {
                $error[] = 'Không được để trống user';
            }else if (strlen(trim(($_POST['user'])) <= 6)) {
                $error[] = 'user phải lớn hơn 6 ký tự';
            }
            if (empty(trim($_POST['email']))) {
                $error[] = 'Không được để trống email';
            }else if (strlen(trim($_POST['email'])) >= 255) {
                $error[] = 'email không được quá 255 ký tự';
            }
            if (empty(trim($_POST['password']))) {
                $error[] = 'Không được để trống mật khẩu';
            } else if (strlen(trim(($_POST['password'])) <= 6)) {
                $error[] = 'mật khẩu phải lớn hơn 6 ký tự';
            }
            if (empty(trim($_POST['tel']))) {
                $error[] = 'không được để trống số điện thoại';
            } else if (strlen(trim($_POST['tel'])) != 10) {
                $error[] = 'số điện thoại không được ít hoặc nhiều hơn 10 số';
            }
            if (empty(trim($_POST['address']))) {
                $error[] = 'Không được để trống địa chỉ';
            } 
            else if (strlen(trim($_POST['address'])) >= 255) {
                $error[] = 'Địa chỉ không được quá 255 ký tự';
            }
            if (empty($error)) {
                $this->user->insertUser(user: $_POST['user'],password: $_POST['password'],email: $_POST['email'],address: $_POST['address'],tel: $_POST['tel'],);
                header("Location: ?act=admin/user/list&message=success!");
            } else {
                $_SESSION['errors'] = $error;
                header("Location: ?act=admin/user/add");
            }
        } else {
            header("Location: ?act=admin/user/list&message=error.");
        }
    }

    public function editUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataOneUser = $this->user->getOneUser($id);
            require_once './views/admin/user/edit.php';       
         }
    }
    public function nextedit()
    {
        if (isset($_POST['editUser'])) {
            $error = [];
            $id = $_GET['id'];
            // empty() kiểm tra có trống hay không
            // trim() kiểm tra không nhận khoảng trắng khi nhận dữ liệu
            // strlen() kiểm tra độ dài của ký tự

            if (empty(trim($_POST['address']))) {
                $error[] = 'Không được để trống địa chỉ';
            } 
            else if (strlen(trim($_POST['address'])) >= 255) {
                $error[] = 'Địa chỉ không được quá 255 ký tự';
            }

            if (empty(trim($_POST['password']))) {
                $error[] = 'Không được để trống mật khẩu';
            } else if (strlen(trim(($_POST['password'])) <= 6)) {
                $error[] = 'mật khẩu phải lớn hơn 6 ký tự';
            }
            if (empty(trim($_POST['tel']))) {
                $error[] = 'không được để trống số điện thoại';
            } else if (strlen(trim($_POST['tel'])) != 10) {
                $error[] = 'số điện thoại không được ít hoặc nhiều hơn 10 số';
            }

            if (empty($error)) {
                $this->user->editUser($id, $_POST['user'], $_POST['password'], $_POST['email'], $_POST['address'], $_POST['tel'], $_POST['role'], $_POST['status']);
                header("Location: ?act=admin/user/list&message=success");
            } else {
                $_SESSION['errors'] = $error;
                header("Location: ?act=admin/user/edit&id=$id");
            }
        } else {
            header("Location: ?act=admin/user/list&message=error.");
        }
    }

    public function deletetUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataOneUser = $this->user->deleteUser($id);
            header("Location: ?act=admin/user/list&message=success");
        }
    }
}