<?php

class AdminDonHangController
{
    public $donHang;

    public function __construct()
    {
        $this->donHang = new donHangModel();
    }

    public function getAllDonHang()
    {
        $listDonHang = $this->donHang->getAllDonHang();
        if($listDonHang){
            require_once './views/admin/DonHang/litsDonHang.php';
        }
    }

    public function detailDonHang()
    {
        $id = $_GET['id'];
        // var_dump($order_id);die;

        $detail = $this->donHang->detailDonHang($id);

        require_once './views/admin/DonHang/detailDonHang.php';
    }
}