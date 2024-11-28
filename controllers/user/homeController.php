<?php 
class HomeController{

    public $home;
    public $chiTietSp;
    public $color;
    public $size;
    public $cart;
    public $comment;

    public function __construct(){
        $this->home =  new ProductModel();
        $this->chiTietSp =  new ProductModel();
        $this->color = new ColorModel();
        $this->size = new SizeModel();
        $this->cart = new CartModel();
        $this->comment = new CommentModel();
    }
    public function home(){
    $datahome= $this->home->getAllProductHome();
    $dataviews = $this->home->getAllProductHomeViews();
    require_once './views/user/home/home.php';

    }

    public function homeIntro(){
        require_once './views/user/intro/intro.php';
    }

    public function homeNew(){
        require_once './views/user/news/news.php';
    }

    public function lienhe(){
        require_once './views/user/lienhe/lienhe.php';
    }
    public function giohang(){
        if(isset($_POST['submit'])) {
        $userId = $_SESSION['account']['id']; 
        $productId = $_GET['id'];
        $quantity = intval($_POST['quantity']);
        $listCart = $this->cart->addToCart($userId, $productId, $quantity);
            header("location: ?act=chitietsp&id=$productId");
            // header("location: ?act=giohang");
        }
    }
    public function themgiohang(){
        
        // require_once './views/user/giohang/giohang.php';
    }
    public function thanhtoan(){
        require_once './views/user/thanhtoan/thanhtoan.php';
    }

    public function chitietsp(){
        $productId = $_GET['id'];
        // var_dump($id);die;
        // $chiTietSp = $this->chiTietSp->getOneProduct($id);
        $chitietsp = $this->chiTietSp->getProductDetails($productId);
        // var_dump($chiTietSp);die;
        $danhMucLienQuan = $this->chiTietSp->getAllProductsByCategory($productId);
        // // var_dump($chiTietSp);die;
        $listColor = $this->color->getAllColor();
        // // var_dump($listColor);die;
        $listSize = $this->size->getAllSize();
        $listComment = $this->comment->commentProduct($productId);
        $congView = $this->home->congView($productId);
        require_once './views/user/chitietsp/chitietsp.php';
    }

    public function addCmt() {
        if (!isset($_SESSION['account']['id'])) {
            echo 'Vui lòng đăng nhập để bình luận.';
            header("Location: ?act=user/dangnhap");
        }
        if (isset($_POST['submit'])) {
            $err = false;
            $id_user = $_SESSION['account']['id']; 
            $id_pro = $_GET['id']; 
            $conten = trim($_POST['conten']);
            $rating = intval($_POST['rating']);
    
            if (empty($conten)) {
                $err = true;
                $_SESSION['error'] = 'Nội dung bình luận không được để trống.';
            }
            if ($rating < 1 || $rating > 5) {
                $err = true;
                $_SESSION['error'] = 'Số sao không hợp lệ.';
            }
    
            if (!$err) {
                $this->comment->addCmt($id_user, $id_pro, htmlspecialchars($conten), $rating);
                header("Location: ?act=chitietsp&id=$id_pro");
                $_SESSION['success'] = 'Bạn đã comment thành công';
            } else {
                header("Location: ?act=chitietsp&id=$id_pro");
            }
        }
    }
    
}
?>