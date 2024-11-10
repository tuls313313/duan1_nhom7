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
            $user = $_POST['user'];
            if(empty($user)){
                $error[] = ' loi user';
            }
            $password = $_POST['password'];
            if(empty($password)){
                $error[] = ' loi password';
            }
            
            $email = $_POST['email'];
            if(empty($email)){
                $error[] = ' loi email';
            }
            $address = $_POST['address'];
            if(empty($address)){
                $error[] = ' loi address';
            }
            $tel = $_POST['tel'];
            if(empty($tel) > 10){
                $error[] = ' loi tel';
            }else if(strlen($tel) > 10){
                $error[] = ' loi tel';
            }
            $create_at = $time;
            $update_at = $time;

            if(empty($error)){
                $this->user->insertUser($user, $password, $email, $address, $tel, $create_at, $update_at);
                header("Location: ?act=admin/user&message=success!");
            }
            else{
                header("Location: ?act=admin/user&message=error.");
            }
        } else {
            header("Location: ?act=admin/user&message=error.");
        }
    }

    public function editUser(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $dataOneUser = $this->user->getOneUser($id);
            require_once './views/admin/user/editUser.php';
        }
    }
    public function next(){
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
            if(empty($tel) > 10){
                $error[] = ' loi tel';
            }else if(strlen($tel) > 10){
                $error[] = ' loi tel';
            }
            $update_at = $time;
            if(empty($error)){
                $this->user->editUser($id ,$user, $password, $email, $address, $tel, $update_at);
                header("Location: ?act=admin/user&message=success");
            }else{
                header("Location: ?act=admin/user&message=error");
            }
        } else {
            header("Location: ?act=admin/user&message=error.");
        }
    }

    public function DeletetUser(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $dataOneUser = $this->user->deleteUser($id);
            header("Location: ?act=admin/user&message=success");
        }
    }



}