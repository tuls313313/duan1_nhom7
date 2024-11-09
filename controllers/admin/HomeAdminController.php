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
}