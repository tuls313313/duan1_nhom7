<?php 
class ThongkeProduct{

    public $thongke;
    public function __construct()
    {
        $this->thongke= new ThongkeProduct();
    }
    public function getAllThongke()
    {
        require_once './view/admin/thongKe/thongkeProduct.php';
    }

}
