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
        // $this->cart = new CartModel();
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
        // $listCart = $this->cart->getAllCart();
        require_once './views/user/giohang/giohang.php';
    }
    public function themgiohang(){
        
        // require_once './views/user/giohang/giohang.php';
    }
    public function thanhtoan(){
        require_once './views/user/thanhtoan/thanhtoan.php';
    }

    public function chitietsp(){
        $id = $_GET['id'];
        // var_dump($id);die;
        $chiTietSp = $this->chiTietSp->getOneProduct($id);
        $categories = $this->chiTietSp->detailSp($id);
        $danhMucLienQuan = $this->chiTietSp->product_categories($id);
        // var_dump($chiTietSp);die;
        $listColor = $this->color->getAllColor();
        // var_dump($listColor);die;
        $listSize = $this->size->getAllSize();
        $listComment = $this->comment->commentProduct($id);
        require_once './views/user/chitietsp/chitietsp.php';
    }
}
?>