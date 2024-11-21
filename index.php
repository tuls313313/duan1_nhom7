<?php 
session_start();

// Require file Common
require_once './commons/env.php';
require_once './commons/database.php';

//user
require_once './controllers/user/userController.php';


//controller admin
require_once './controllers/admin/categoriesController.php';
require_once './controllers/admin/comentController.php';
require_once './controllers/admin/orderController.php';
require_once './controllers/admin/productController.php';
require_once './controllers/admin/thongkeController.php';
require_once './controllers/admin/userController.php';

//models admin
require_once './models/admin/categoriesModel.php';
require_once './models/admin/commentModel.php';
require_once './models/admin/orderModel.php';
require_once './models/admin/productModel.php';
require_once './models/admin/thongkeModel.php';
require_once './models/admin/userModels.php';

$User = new HomeUserController();
$AdminUser = new HomeAdminController;
$AdminOrder = new OrderController();
$AdminCategories = new CategoriesController();
$adminCmt = new ComentController();
$adminProduct = new ProductController();
$adminstatistical = new ThongkeController();

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

$act = $_GET['act'] ?? '/';
match ($act) {
    // Người dùng
    '/' => $User->homeUser(),
    'trangchu' => $User->homeUser(),
    'intro' => $User->homeIntro(),
    'news' => $User->homeNew(),
    'lienhe' => $User->lienhe(),
    'dangky' => $User->dangky(),
    'dangnhap' => $User->dangnhap(),
    'giohang' => $User->giohang(),
    'thanhtoan' => $User->thanhtoan(),
    'chitietsp' => $User->chitietsp(),

    // Quản trị viên

    // Quản lý tài khoản
     'admin/user/list' => $AdminUser->ListUser(),
     'admin/user/add' =>$AdminUser->insertUser(),
     'admin/user/nextadd' => $AdminUser->nextInsertUser(),
     'admin/user/edit' => $AdminUser->editUser(),
     'admin/user/nextedit' => $AdminUser->nextedit(),
     'admin/user/delete' => $AdminUser->deletetUser(),

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


    // Quản lý sản phẩm
    'admin/product/list' => $adminProduct->getAllProduct(),
    'admin/product/edit' => $adminProduct->editProduct(),
    "admin/product/nextedit" => $adminProduct->nexteditProduct(),
    "admin/product/add" => $adminProduct->insertProduct(),
    "admin/product/delete" =>$adminProduct->DeleteProduct(),

    // quản lý thống kê
    'admin/statistical' => $adminstatistical->statistical(),
};