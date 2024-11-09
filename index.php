<?php 

// Require file Common
// require_once './commons/env.php'; // Khai báo biến môi trường
// require_once './commons/function.php'; // Hàm hỗ trợ
require_once './controllers/user/HomeUserController.php';
require_once './controllers/admin/HomeAdminController.php';

// // Require toàn bộ file Controllers
// require_once './controllers/HomeController.php';

// // Require toàn bộ file Models
// require_once './models/Student.php';
$homeUser = new HomeUserController();
$homeAdmin = new HomeAdminController;

// Route

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

$act = $_GET['act'] ?? '/';

$response = match ($act) {
    // Người dùng
    '/' => $homeUser->homeUser(),
    'trangchu' => $homeUser->homeUser(),
    'intro' => $homeUser->homeIntro(),

    // Quản trị viên
    'admin' => $homeAdmin->homeAdmin(),

    default => null,
};

if ($response === null) {
    http_response_code(404);
    echo "<h1>Trang bạn tìm kiếm không tồn tại.</h1>";

}



