<?php 
class HomeController{
    public function home(){
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
        require_once './views/user/giohang/giohang.php';
    }
    public function thanhtoan(){
        require_once './views/user/thanhtoan/thanhtoan.php';
    }

    public function chitietsp(){
        require_once './views/user/chitietsp/chitietsp.php';
    }
}
?>