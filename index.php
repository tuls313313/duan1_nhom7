<?php
session_start();

// Require file Common
require_once './commons/env.php';
require_once './commons/database.php';
require_once './vendor/autoload.php';


//controller user
require_once './controllers/user/homeController.php';
require_once './controllers/user/account/accountController.php';

//controller admin
require_once './controllers/admin/categoriesController.php';
require_once './controllers/admin/comentController.php';
require_once './controllers/admin/orderController.php';
require_once './controllers/admin/productController.php';
require_once './controllers/admin/thongkeController.php';
require_once './controllers/admin/userController.php';
require_once './controllers/admin/colorController.php';
require_once './controllers/admin/promotionController.php';
require_once './controllers/admin/sizeController.php';
require_once './controllers/admin/variantiController.php';



//models
require_once './models/orderModel.php';
require_once './models/admin/thongkeModel.php';
require_once './models/cartModel.php';
require_once './models/categoriesModel.php';
require_once './models/colorModel.php';
require_once './models/commentModel.php';
require_once './models/productModel.php';
require_once './models/promotionModel.php';
require_once './models/sizeModel.php';
require_once './models/userModels.php';
require_once './models/variantiModel.php';
require_once './models/apiModel.php';





$home = new HomeController();
$User = new AccountController();
$AdminUser = new HomeAdminController();
$order = new OrderController();
$AdminCategories = new CategoriesController();
$adminCmt = new ComentController();
$adminProduct = new ProductController();
$adminstatistical = new ThongkeController();
$AdminColor = new ColorController();
$promotion = new PromotionController();
$AdminSize = new SizeController();
$vianti = new VariantiController();

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

$act = $_GET['act'] ?? '/';
match ($act) {
  // Người dùng
  '/' => $home->home(),
  'trangchu' => $home->home(),
  'intro' => $home->homeIntro(),
  'news' => $home->homeNew(),
  'lienhe' => $home->lienhe(),
  'giohang' => $home->giohang(),
  'themgiohang' => $home->themgiohang(),
  'xoagiohang' => $home->xoagiohang(),
  'thanhtoan' => $home->thanhtoan(),
  'chitietsp' => $home->chitietsp(),
  'product' => $home->product(),
  'user/comment/add' => $home->addCmt(),
  'user/order' => $home->thanhtoan(),
  'user/orderOnl' => $home->thanhtoanonl(),
  'user/get_tt_onl' => $home->get_tt_onl(),




  //  đăng ký đăng nhập
  'user/dangky' => $User->insert(),
  'user/nextdangky' => $User->nextinsert(),
  'user/dangnhap' => $User->dangnhap(),
  'user/nextdangnhap' => $User->nextDangNhap(),
  'user/dangxuat' => $User->dangxuat(),
  'user/edit' => $User->edit(),
  'user/nextedit' => $User->nextEdit(),
  'user/quenmk' => $User->quenmk(),
  'user/changeMK' => $User->changeQuenMk(),
  "user/order_history" =>$User->history_order(),
  "user/orders_history" => $User->order_history(),

  // Quản trị viên
  // Quản lý tài khoản
  'admin/user/list' => $AdminUser->ListUser(),
  'admin/user/add' => $AdminUser->insertUser(),
  'admin/user/nextadd' => $AdminUser->nextInsertUser(),
  'admin/user/edit' => $AdminUser->editUser(),
  'admin/user/nextedit' => $AdminUser->nextedit(),
  'admin/user/delete' => $AdminUser->deletetUser(),

  // Quản Lý Đơn Hàng
  'admin/order' => $order->listOder(),
  'admin/order/detail' => $order->detailOrder(),
  'admin/order/edit' => $order->editOrder(),
  'admin/order/editOrder' => $order->postOrder(),

  // Quản lý danh mục
  'admin/categories' => $AdminCategories->getAllCategory(),
  'admin/categories/edit' => $AdminCategories->editCategory(),
  'admin/categories/editCategories' => $AdminCategories->postCategory(),
  'admin/categories/delete' => $AdminCategories->deleteCategory(),
  'admin/categories/add' => $AdminCategories->addCategory(),
  'admin/categories/addCategories' => $AdminCategories->formAddCategory(),

  // quản lý bình luận 
  'admin/comment/list' => $adminCmt->listCmt(),
  // 'admin/comment/nextadd' => $adminCmt->nextAddCmt(),
  'admin/comment/edit' => $adminCmt->editCmt(),
  'admin/comment/nexteditcmt' => $adminCmt->nextEditCmt(),
  'admin/comment/delete' => $adminCmt->delCmt(),


  // Quản lý sản phẩm
  'admin/product/list' => $adminProduct->getAllProduct(),
  'admin/product/edit' => $adminProduct->editProduct(),
  "admin/product/nextedit" => $adminProduct->nexteditProduct(),
  "admin/product/add" => $adminProduct->insertProduct(),
  "admin/product/delete" => $adminProduct->DeleteProduct(),

  // quản lý thống kê
  'admin/statistical' => $adminstatistical->statistical(),
  "admin/statisticalV2" => $adminstatistical->thongketheongay(),

  // Quản lý color
  'admin/color' => $AdminColor->listColor(),
  'admin/color/edit' => $AdminColor->editColor(),
  'admin/color/nextedit' => $AdminColor->nexteditColor(),
  'admin/color/delete' => $AdminColor->deleteColor(),
  'admin/color/add' => $AdminColor->addColor(),
  'admin/color/addColor' => $AdminColor->formColor(),

  // Quản lý size
  'admin/size' => $AdminSize->listSize(),
  'admin/size/edit' => $AdminSize->editSize(),
  'admin/size/nextedit' => $AdminSize->nexteditSize(),
  'admin/size/delete' => $AdminSize->deleteSize(),
  'admin/size/add' => $AdminSize->addSize(),
  'admin/size/addSize' => $AdminSize->formSize(),

  // quản lý khuyến mãi
  'admin/promotion/list' => $promotion->list(),
  'admin/promotion/add' => $promotion->add(),
  'admin/promotion/nextadd' => $promotion->nextadd(),
  'admin/promotion/update' => $promotion->update(),
  'admin/promotion/nextupdate' => $promotion->nextUpdate(),
  'admin/promotion/delete' => $promotion->delete(),

  // varianti - bieens the
  'admin/varianti/list' => $vianti->listVar(),
  'admin/varianti/add' => $vianti->addVar(),
  'admin/varianti/nextadd' => $vianti->nextAddVar(),
  'admin/variant/edit' => $vianti->editVar(),
  'admin/variant/nextedit' => $vianti->nextEditVar(),
  'admin/variant/delete' => $vianti->delVar(),

};
