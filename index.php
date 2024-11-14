<?php 
session_start();

// Require file Common
require_once './commons/env.php';
require_once './commons/database.php';

//user
require_once './controllers/user/userController.php';
require_once './controllers/admin/userController.php';
require_once './controllers/admin/orderController.php';
require_once './controllers/user/userController.php';


//controller
require_once './controllers/admin/orderController.php';
require_once './controllers/admin/userController.php';

//models
require_once './models/admin/userModels.php';
require_once './models/admin/orderModel.php';

$User = new HomeUserController();
$Admin = new HomeAdminController;
$AdminOrder = new OrderController();

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

$act = $_GET['act'] ?? '/';
match ($act) {
    // Người dùng
    '/' => $User->homeUser(),
    'trangchu' => $User->homeUser(),
    'intro' => $User->homeIntro(),
    'news' => $User->homeNew(),

    // Quản trị viên
    'admin/user' => $Admin->UserAdmin(),

    // Quản Lý Đơn Hàng
    'admin/order' => $AdminOrder->getAllOrder(),
    'admin/order/detail' => $AdminOrder->detailOrder(),
    'admin/order/edit' => $AdminOrder->editOrder(),
    'admin/order/editOrder' => $AdminOrder->postOrder(),


    'admin/user/add' =>$Admin->insertUser(),
    'admin/user/edit' => $Admin->editUser(),
    'admin/user/nextinsert' => $Admin->nextInsertUser(),
    'admin/user/nextedit' => $Admin->nextedit(),
    'admin/user/delete' => $Admin->DeletetUser(),
};



