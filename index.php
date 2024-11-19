<?php 
session_start();

// Require file Common
require_once './commons/env.php';
require_once './commons/database.php';

//user
require_once './controllers/user/userController.php';


//controller admin
require_once './controllers/admin/orderController.php';
require_once './controllers/admin/userController.php';
require_once './controllers/admin/categoriesController.php';
require_once './controllers/admin/comentController.php';

//models admin
require_once './models/admin/userModels.php';
require_once './models/admin/orderModel.php';
require_once './models/admin/categoriesModel.php';
require_once './models/admin/commentModel.php';

$User = new HomeUserController();
$Admin = new HomeAdminController;
$AdminOrder = new OrderController();
$AdminCategories = new CategoriesController();
$adminCmt = new ComentController();

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

$act = $_GET['act'] ?? '/';
match ($act) {
    // Người dùng
    '/' => $User->homeUser(),
    'trangchu' => $User->homeUser(),
    'intro' => $User->homeIntro(),
    'news' => $User->homeNew(),

    // Quản trị viên

    // Quản lý tài khoản
     'admin/user/list' => $Admin->ListUser(),
     'admin/user/add' =>$Admin->insertUser(),
     'admin/user/nextadd' => $Admin->nextInsertUser(),
     'admin/user/edit' => $Admin->editUser(),
     'admin/user/nextedit' => $Admin->nextedit(),
     'admin/user/delete' => $Admin->deletetUser(),


    // Quản Lý Đơn Hàng
    'admin/order' => $AdminOrder->getAllOrder(),
    'admin/order/detail' => $AdminOrder->detailOrder(),
    'admin/order/edit' => $AdminOrder->editOrder(),
    'admin/order/editOrder' => $AdminOrder->postOrder(),

    // Quản lý danh mục
    'admin/categories' => $AdminCategories->getAllCategory(),
    'admin/categories/edit' => $AdminCategories->editCategory(),
    'admin/categories/editCategories' => $AdminCategories->postCategory(),
    'admin/categories/delete' => $AdminCategories->deleteCategory(),
    'admin/categories/add' => $AdminCategories->addCategory(),
    'admin/categories/addCategories' => $AdminCategories->formAddCategory(),

    // quản lý bình luận 
    'admin/comment/list' => $adminCmt->listCmt(),
    'admin/comment/add' => $adminCmt->addCmt(),
    'admin/comment/nextadd' => $adminCmt->nextAddCmt(),
    'admin/comment/edit' => $adminCmt->editCmt(),
    'admin/comment/nexteditcmt' => $adminCmt->nextEditCmt(),
    'admin/comment/delete' => $adminCmt ->delCmt(),

    
};



