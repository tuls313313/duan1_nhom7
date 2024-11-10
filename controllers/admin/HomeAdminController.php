<?php 
class HomeAdminController{

    public $user;

    public function __construct(){
        $this->user = new UserModels();
    }
    public function UserAdmin(){
        $dataUser = $this->user->getAllUser();
        if($dataUser){
            require_once './views/admin/user/user.php';
        }
        
        // var_dump(value: $data);
    }

    public function insertUser() {
        if (isset($_GET['addUser'])) {
            $time = date('Y-m-d H:i:s');
            $user = $_POST['user'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            
            if (!empty($user) && !empty($password) && !empty($email) && !empty($address) && !empty($tel)) {
                $create_at = $time;
                $update_at = $time;
                $this->user->insertUser($user, $password, $email, $address, $tel, $create_at, $update_at);
                header("Location: ?act=admin/user&message=Thêm thành công!");
            } else {
                header("Location: ?act=admin/user&message=Vui lòng điền đầy đủ thông tin.");
            }
        } else {
            header("Location: ?act=admin/user&message=Thêm thất bại.");
        }
        exit;
    }
    
    
    
}