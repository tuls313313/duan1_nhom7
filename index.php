<?php 

// Require file Common
// require_once './commons/env.php'; // Khai báo biến môi trường
// require_once './commons/function.php'; // Hàm hỗ trợ
require_once './commons/env.php';
require_once './commons/database.php';

//user
require_once './controllers/user/HomeUserController.php';

//admin
//controller
require_once './controllers/admin/userController.php';

//models
require_once './models/admin/userModels.php';
// hinh
$User = new HomeUserController();
$Admin = new HomeAdminController;

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

$act = $_GET['act'] ?? '/';

$response = match ($act) {
    // Người dùng
    '/' => $User->homeUser(),
    'trangchu' => $User->homeUser(),
    'intro' => $User->homeIntro(),
    'news' => $User->homeNew(),

    // Quản trị viên
    'admin/user' => $Admin->UserAdmin(),
    'admin/user/add' =>$Admin->insertUser(),
    'admin/user/edit' => $Admin->editUser(),
    'admin/user/nextedit' => $Admin->nextedit(),
    'admin/user/delete' => $Admin->DeletetUser(),
};



