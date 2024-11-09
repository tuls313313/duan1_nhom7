<?php 

class HomeUserController{
    
    public function homeUser(){
        require_once './views/user/home/home.php';
    }

    public function homeIntro(){
        require_once './views/user/intro/intro.php';
    }
}